<?php declare(strict_types=1);

use DI\Container;
use Doctrine\DBAL\DriverManager;
use Slim\Factory\AppFactory;
use Symfony\Component\Dotenv\Dotenv;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

// CONFIGURACIÓN ------------------------------------------------------------------------------------------------------

// Carga las variables de entorno - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

// Crea la aplicación con un contenedor manipulable - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

// Carga Whoops! sólo en entorno de desarrollo  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
if ('development' === $_ENV['ENVIRONMENT']) {
    $app->add(new Zeuxisoo\Whoops\Slim\WhoopsMiddleware());
}

// SERVICIOS ----------------------------------------------------------------------------------------------------------

// Añade Twig al contenedor - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$container->set('twig', function () {
    $loader = new FilesystemLoader(__DIR__ . '/../src/view');
    return new Environment($loader, [
        'cache' => __DIR__ . '/../tmp',
    ]);
});

// Base de datos  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$container->set('db', function () {
    $connectionParams = [
        'dbname' => $_ENV['DATABASE_NAME'],
        'user' => $_ENV['DATABASE_USER'],
        'password' => $_ENV['DATABASE_PASSWORD'],
        'host' => $_ENV['DATABASE_HOST'],
        'driver' => $_ENV['DATABASE_DRIVER'],
    ];

    return DriverManager::getConnection($connectionParams);
});

// RUTAS --------------------------------------------------------------------------------------------------------------

// Página principal - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$app->get('/', \App\Controller\HomeController::class . ':index');

// ¡VAMOS! ------------------------------------------------------------------------------------------------------------
$app->run();
