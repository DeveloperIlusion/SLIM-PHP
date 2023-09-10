<?php

namespace App\Controller;

use App\Models\CategoryModel;
use DatabaseHandler;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use Slim\Views\Twig;
use Slim\App;

class HomeController
{
    private $container;
    protected $dbHandler;
    protected $twig;
    protected $view;

    // constructor receives container instance
    public function __construct(ContainerInterface $container, DatabaseHandler $dbHandler, Twig $twig)
    {
        $this->container = $container;
        $this->dbHandler = $dbHandler;
        $this->twig = $twig;
    }

    public function categoryList(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $resposta = $this->dbHandler->findAll($request, $response, 'categoria');
        $jsonContent = (string) $resposta->getBody();
        $jsonContent = str_replace( ["<div class='d-none'>", "</div>"], "", $jsonContent);
        $data = json_decode($jsonContent, true);
        $insertButton = "<a href='/insert' title='Inserção' class='btn btn-outline-danger'><i class='fa fa-plus' area-hidden='true'></i></a>&nbsp;&nbsp;";

        return $this->twig->render(
            $response, 
            'Views/Admin/listaCategoria.twig', 
            [
                'base_url' => base_url() . "Assets/DataTables/datatables.min.js",
                'data' => $data,
                'insertButton' => $insertButton
            ]
        );
    }

    public function categoryForm(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $returnButton = '<a href="/" class="btn btn-outline-secondary" title="Voltar">Voltar</a>';
        $data = $request->getParsedBody();
        $uri = $request->getUri();
        $path = $uri->getPath();
        $arrayPath = explode("/", $path);
        $acao = $arrayPath[1];
        if ($acao == "insert") {
            $acaoView = '<h2 class="title-contact">Inserir</h2>';
        } else if ($acao == "visualize") {
            $acaoView = '<h2 class="title-contact">Visualizar</h2>';
        } else if ($acao == "update") {
            $acaoView = '<h2 class="title-contact">Atualizar</h2>';
        } else if ($acao == "delete") {
            $acaoView = '<h2 class="title-contact">Deletar</h2>';
        }
        
        if (!empty($data) && ($acao == "insert")) {
            $this->dbHandler->insert($request, $response, "categoria", $data);
            return $response->withHeader('Location', 'http://slim/')->withStatus(302);
        } else if (!empty($data) && ($acao == "update")) {
            $this->dbHandler->update($request, $response, "categoria", $data, $arrayPath[2]);
            return $response->withHeader('Location', 'http://slim/')->withStatus(302);
        } else if (!empty($data) && ($acao == "delete")) {
            $this->dbHandler->delete($request, $response, "categoria", $arrayPath[2]);
            return $response->withHeader('Location', 'http://slim/')->withStatus(302);
        }
        
        if ($acao != "insert") {
            if (!empty($arrayPath[2])) {
                $id = "id=" . $arrayPath[2];
                $pesquisa = $this->dbHandler->find($request, $response, 'categoria',  $id, "*");
                $jsonContent = (string) $pesquisa->getBody();
                $jsonContent = str_replace( ["<div class='d-none'>", "</div>"], "", $jsonContent);
                $dataInDatabase = json_decode($jsonContent, true);
            }
        }

        return $this->twig->render(
            $response, 
            'Views/Admin/formCategoria.twig',
            [
                "returnButton" => $returnButton ?? "",
                "acaoView" => $acaoView,
                "acao" => $acao,
                "path" => $path,
                "dataInDatabase" => $dataInDatabase[0] ?? ""
            ]
        );
    }
}
