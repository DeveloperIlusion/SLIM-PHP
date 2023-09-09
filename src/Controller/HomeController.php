<?php

namespace App\Controller;

use DatabaseHandler;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
   private $container;

   // constructor receives container instance
   public function __construct(ContainerInterface $container)
   {
       $this->container = $container;
   }

   public function home(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
   {
          $dbHandler = new DatabaseHandler($this->get(PDO::class), "addresses");
          $resposta = $dbHandler->findAll($request, $response);
          $jsonContent = (string) $resposta->getBody();
          $data = json_decode($jsonContent, true);

          $response->getBody()->write('Hello world!');
               
          return $response;
   }

   public function contact(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
   {
        // your code to access items in the container... $this->container->get('');
        
        return $response;
   }
}