<?php

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Define app routes
$app->get('/', function (Request $request, Response $response, $args) {
    echo "TESTE DE PRIMEIRA PÁGINA NO SLIM";
    return $response;
});

// Run app
$app->run();