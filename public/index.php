<?php declare(strict_types=1);

use DI\Container;
use Slim\Factory\AppFactory;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// CONFIGURACIÓN ------------------------------------------------------------------------------------------------------

// Carga las variables de entorno - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

// Crea la aplicación con un contenedor manipulable - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

require_once __DIR__ . '/../etc/middlewares.php';

require_once __DIR__ . '/../etc/dependencies.php';

require_once __DIR__ . '/../etc/routes.php';

// ¡VAMOS! ------------------------------------------------------------------------------------------------------------
$app->run();
