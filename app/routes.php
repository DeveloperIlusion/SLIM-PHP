<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\Twig;
use Slim\Views\PhpRenderer;

return function (App $app) {
    // $app->options('/{routes:.*}', function (Request $request, Response $response) {
    //     // CORS Pre-Flight OPTIONS Request Handler
    //     return $response;
    // });

    // $app->get('/', function (Request $request, Response $response) {
    //     $response->getBody()->write('Hello world!');
    //     return $response;
    // });

    $app->get('/', function (Request $request, Response $response, $args) {
        // $view = Twig::fromRequest($request);
        // $view->render($response, 'Croche/Views/Comuns/menu.php', $args);
        // $view->render($response, 'Croche/Views/Admin/listaCategoria.php', $args);
        // return $view->render($response, 'Croche/Views/Comuns/rodape.php', $args);


        // $db = $this->get(PDO::class);
        // $sth = $db->prepare("SELECT * FROM categoria");
        // $sth->execute();
        // $dados = $sth->fetchAll(PDO::FETCH_ASSOC);

        $db = $this->get(PDO::class);
        $dbHandler = new DatabaseHandler($db, 'categoria', 'Categoria', 'Descricao');
        $resposta = $dbHandler->findAll($request, $response);
        $jsonContent = (string) $resposta->getBody();
        $data = json_decode($jsonContent, true);

        $view = new PhpRenderer("../templates/Croche/Views/");
        $view->render($response, "Comuns/cabecalho.php");
        $view->render($response, "Comuns/menu.php");
        $view->render($response, "Admin/listaCategoria.php", $data);
        $view->render($response, "Comuns/rodape.php");
        return $view->render($response, "Comuns/rodape.php");;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
