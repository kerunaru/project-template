<?php declare(strict_types=1);

// SERVICIOS ----------------------------------------------------------------------------------------------------------

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Añade Twig al contenedor - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

/** @var $container */
$container->set(Environment::class, function () {
    $loader = new FilesystemLoader(__DIR__ . '/../src/Infrastructure/Twig/View');
    return new Environment($loader, [
        'cache' => __DIR__ . '/../tmp',
    ]);
});

// Base de datos  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$container->set(Connection::class, function () {
    $connectionParams = [
        'dbname' => $_ENV['DATABASE_NAME'],
        'user' => $_ENV['DATABASE_USER'],
        'password' => $_ENV['DATABASE_PASSWORD'],
        'host' => $_ENV['DATABASE_HOST'],
        'driver' => $_ENV['DATABASE_DRIVER'],
    ];

    return DriverManager::getConnection($connectionParams);
});
