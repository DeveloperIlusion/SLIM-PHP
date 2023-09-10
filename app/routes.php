<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Controller\HomeController;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\Twig;
use Slim\Views\PhpRenderer;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        $response->getBody()->write("Página Inexistente.");
        return $response;
    });

    $app->get('/', '\App\Controller\HomeController:categoryList');
    $app->post('/', '\App\Controller\HomeController:categoryList');

    $app->get('/insert', '\App\Controller\HomeController:categoryForm');
    $app->post('/insert', '\App\Controller\HomeController:categoryForm');

    $app->get('/visualize/{id}', '\App\Controller\HomeController:categoryForm');
    $app->post('/visualize/{id}', '\App\Controller\HomeController:categoryForm');

    $app->get('/update/{id}', '\App\Controller\HomeController:categoryForm');
    $app->post('/update/{id}', '\App\Controller\HomeController:categoryForm');
    
    $app->get('/delete/{id}', '\App\Controller\HomeController:categoryForm');
    $app->post('/delete/{id}', '\App\Controller\HomeController:categoryForm');
};
