<?php declare(strict_types=1);

use DI\Container;
use Slim\Factory\AppFactory;
use Symfony\Component\Dotenv\Dotenv;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

// Crea la aplicación con un contenedor manipulable
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

// Carga Whoops! sólo en entorno de desarrollo
if ('development' === $_ENV['ENVIRONMENT']) {
    $app->add(new Zeuxisoo\Whoops\Slim\WhoopsMiddleware());
}

// Añade Twig al contenedor
$container->set('twig', function () {
    $loader = new FilesystemLoader(__DIR__ . '/../src/view');
    return new Environment($loader, [
        'cache' => __DIR__ . '/../tmp',
    ]);
});

//// Rutas ////
// > Página principal
$app->get('/', \App\Controller\HomeController::class . ':index');

// ¡Vamos!
$app->run();
