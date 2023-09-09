<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Psr7\Stream;

class DatabaseHandler {
    private $db;
    private $tableName;
    private $column1Name;
    private $column2Name;

    public function __construct(PDO $db, $tableName, $column1Name, $column2Name) {
        $this->db = $db;
        $this->tableName = $tableName;
        $this->column1Name = $column1Name;
        $this->column2Name = $column2Name;
    }

    public function findAll(Request $request, Response $response) {
        $sql = "SELECT * FROM {$this->tableName}";
        
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

    public function insert(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $sql = "INSERT INTO {$this->tableName} ({$this->column1Name}, {$this->column2Name}) VALUES (:{$this->column1Name}, :{$this->column2Name})";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":{$this->column1Name}", $data[$this->column1Name]);
        $stmt->bindParam(":{$this->column2Name}", $data[$this->column2Name]);
        
        if ($stmt->execute()) {
            return $response->withJson(['message' => 'Registro inserido com sucesso.']);
        } else {
            return $response->withJson(['error' => 'Erro ao inserir o registro.'], 500);
        }
    }

    public function delete(Request $request, Response $response, $args) {
        $id = $args['id'];
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return $response->withJson(['message' => 'Registro excluído com sucesso.']);
        } else {
            return $response->withJson(['error' => 'Erro ao excluir o registro.'], 500);
        }
    }

    public function update(Request $request, Response $response, $args) {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $sql = "UPDATE {$this->tableName} SET {$this->column1Name} = :{$this->column1Name}, {$this->column2Name} = :{$this->column2Name} WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(":{$this->column1Name}", $data[$this->column1Name]);
        $stmt->bindParam(":{$this->column2Name}", $data[$this->column2Name]);
        
        if ($stmt->execute()) {
            return $response->withJson(['message' => 'Registro atualizado com sucesso.']);
        } else {
            return $response->withJson(['error' => 'Erro ao atualizar o registro.'], 500);
        }
    }
}
