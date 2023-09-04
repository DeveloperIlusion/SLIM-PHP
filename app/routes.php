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
        $lista = new Lista($this->connection);

        $args['lista'] = $lista->getLista();
        
        $view = Twig::fromRequest($request);
        $view->render($response, 'Comuns/cabecalho.php');
        $view->render($response, 'Comuns/menu.php');
        return $view->render($response, 'Admin/listaCategoria.php', $args);
        //$view->render($response, 'Comuns/rodape.php');
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
