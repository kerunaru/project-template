<?php declare(strict_types=1);

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\StreamFactory;

class HomeController
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
         $this->container = $container;
    }

    public function index(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        return $response->withBody(
            (new StreamFactory())->createStream(
                $this->container->get('twig')->render('index.twig')
            )
        );
    }
}
