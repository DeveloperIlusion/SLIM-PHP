<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\Container;
use DI\ContainerBuilder;
use FTP\Connection;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

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
        }
    ], 
    [
        Connection::class => function (ContainerInterface $c) {
            $settings = $c->get('settings')['db'];
            $pdo = new PDO("mysql:host=".$settings['host'].";dbname=".$settings['database_name'], $settings['database_user'], $settings['database_pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    ]);
};
