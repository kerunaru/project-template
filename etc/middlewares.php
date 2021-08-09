<?php declare(strict_types=1);

// Carga Whoops! sólo en entorno de desarrollo  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
/** @var $app */
if ('development' === $_ENV['ENVIRONMENT']) {
    $app->add(new Zeuxisoo\Whoops\Slim\WhoopsMiddleware());
}
