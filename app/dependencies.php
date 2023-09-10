<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use App\Controller\HomeController;
use DI\Container;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use PDO;
use DatabaseHandler; // Importe a classe DatabaseHandler se ainda não estiver importada
use Slim\Views\Twig;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },

        PDO::class => function (ContainerInterface $c) {

            $settings = $c->get(SettingsInterface::class);

            $dbSettings = $settings->get('db');

            $host = $dbSettings['host'];
            $dbname = $dbSettings['database'];
            $username = $dbSettings['username'];
            $password = $dbSettings['password'];
            $charset = $dbSettings['charset'];
            $flags = $dbSettings['flags'];
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
            return new PDO($dsn, $username, $password);
        },

        'DatabaseHandler' => function (ContainerInterface $c) {
            $pdo = $c->get(PDO::class);
        
            // Retorne uma instância do DatabaseHandler
            return new DatabaseHandler($pdo);
        },

        Twig::class => function (ContainerInterface $container) {
            $settings = $container->get(SettingsInterface::class);
            $twigSettings = $settings->get('twig');

            $twig = Twig::create($twigSettings['path'], [
                'cache' => $twigSettings['cache_enabled'] ? $twigSettings['cache_path'] : false,
            ]);

            // Add any extensions or functions you need here, for example:
            // $twig->addExtension(new TwigExtension());
            
            return $twig;
        }
    ]);

    // $container['HomeController'] = function($c) {
    //     $view = $c->get("view"); // retrieve the 'view' from the container
    //     return new HomeController($view);
    // };
};
