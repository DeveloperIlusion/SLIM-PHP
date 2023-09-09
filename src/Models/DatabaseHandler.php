<?php

use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Psr7\Stream;

class DatabaseHandler {
    private $db;
    private $tableName;

    public function __construct(PDO $db, $tableName) {
        $this->db = $db;
        $this->tableName = $tableName;
    }

    public function findAll(Request $request, Response $response, string $column = '*') {
        $sql = "SELECT $column FROM {$this->tableName}";
        
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result) {
            $response->getBody()->write(json_encode($result));

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

    public function insert(Request $request, Response $response, $args, string $column) {
        $data = $request->getParsedBody();
        $sql = "INSERT INTO {$this->tableName} ($column) VALUES (:value)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':value', $data['value']); // Substitua 'value' pelo nome do campo correspondente
        
        if ($stmt->execute()) {
            return $response->withJson(['message' => 'Registro inserido com sucesso.']);
        } else {
            return $response->withJson(['error' => 'Erro ao inserir o registro.'], 500);
        }
    }

    public function delete(Request $request, Response $response, $args, string $column) {
        $value = $args['value'];
        $sql = "DELETE FROM {$this->tableName} WHERE $column = :value";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':value', $value);
        
        if ($stmt->execute()) {
            return $response->withJson(['message' => 'Registro excluído com sucesso.']);
        } else {
            return $response->withJson(['error' => 'Erro ao excluir o registro.'], 500);
        }
    }

    public function update(Request $request, Response $response, $args, string $column) {
        $value = $args['value'];
        $data = $request->getParsedBody();
        $sql = "UPDATE {$this->tableName} SET $column = :value WHERE $column = :oldValue";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':value', $data['newValue']); // Substitua 'newValue' pelo nome do campo correspondente
        $stmt->bindParam(':oldValue', $value);
        
        if ($stmt->execute()) {
            return $response->withJson(['message' => 'Registro atualizado com sucesso.']);
        } else {
            return $response->withJson(['error' => 'Erro ao atualizar o registro.'], 500);
        }
    }
}
