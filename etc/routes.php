<?php declare(strict_types=1);

// RUTAS --------------------------------------------------------------------------------------------------------------

use App\Infrastructure\Slim\Action\HomeAction;

// Página principal - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
/** @var $app */
$app->get('/', HomeAction::class);
