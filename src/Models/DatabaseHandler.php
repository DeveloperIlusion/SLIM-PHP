<?php
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class DatabaseHandler {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findAll(Request $request, Response $response, string $table = "", string $column = '*') {
        $sql = "SELECT $column FROM {$table}";

        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            $response->getBody()->write("<div class='d-none'>" . json_encode($result) . "</div>");

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            $response->getBody()->write(json_encode(['message' => 'Nenhum registro encontrado.']));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }

    public function find(Request $request, Response $response, string $table, string $terms, string $column = '*') {
        $sql = "SELECT $column FROM {$table} WHERE $terms";

        
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            $response->getBody()->write("<div class='d-none'>" . json_encode($result) . "</div>");

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            $response->getBody()->write(json_encode(['message' => 'Nenhum registro encontrado.']));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }

    public function insert(Request $request, Response $response, string $table, array $data) {
        $data = array_filter($data);
        $values = "";
        $columns = "";
        $params = "";
            foreach ($data as $index => $value) {
                if (!empty($params)) {
                    $columns = $columns . ", ";
                    $params = $params . ", ";
                    $values = $values . ", ";
                }
                $columns = $columns . $index;
                $params = $params . ":" . $index;
                $values = $values . $value;
                
            }
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$params})";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $column => &$receive) {
            $stmt->bindParam(":{$column}", $receive);
        }
        if ($stmt->execute()) {
            $mensagem = "Registro inserido com sucesso.";
            return $response->getBody()->write("<div class='d-none'> $mensagem </div>");
        } else {
            $mensagem = 'Erro ao inserir o registro.';
            return $response->getBody()->write("<div class='d-none'> $mensagem </div>");
        }
    }

    public function delete(Request $request, Response $response, string $table, string $id) {
        $value = $request->getAttribute('value');
        $sql = "DELETE FROM {$table} WHERE id = $id";

        $stmt = $this->db->prepare($sql);

        if ($stmt->execute()) {
            $mensagem = "Registro excluído com sucesso.";
            return $response->getBody()->write("<div class='d-none'> $mensagem </div>");
        } else {
            $mensagem = 'Erro ao excluir o registro.';
            return $response->getBody()->write("<div class='d-none'> $mensagem </div>");
        }
    }

    public function update(Request $request, Response $response, string $table, array $data, string $id) {
        $data = array_filter($data);
        $newData = "";
        foreach ($data as $index => $value) {
            if (!empty($newData)) {
                $newData .= ", ";
            }
            $newData .= "$index = :$index";
        }
    
        $sql = "UPDATE $table SET $newData WHERE id = :id";
        $stmt = $this->db->prepare($sql);
    
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        foreach ($data as $index => &$value) {
            $stmt->bindParam(":$index", $value);
        }
    
        if ($stmt->execute()) {
            $mensagem = "Registro atualizado com sucesso.";
            return $response->getBody()->write("<div class='d-none'> $mensagem </div>");
        } else {
            $mensagem = 'Erro ao atualizar o registro.';
            return $response->getBody()->write("<div class='d-none'> $mensagem </div>");
        }
    }    
}
