<?php declare(strict_types=1);

namespace App\Test\Traits;

use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ServerRequestFactory;

trait AppTestTrait
{
    /** @var DI\Container */
    protected $container;

    /**  @var Slim\App */
    protected $app;

    protected function setUp(): void
    {
        require __DIR__ . '/../../public/index.php';

        $this->container = $container;
        $this->app = $app;

        // Suprime la salida por pantalla
        $this->setOutputCallback(function() {});
    }

    protected function mock(string $class): MockObject
    {
        if (!class_exists($class)) {
            throw new InvalidArgumentException(sprintf('Class not found: %s', $class));
        }

        $mock = $this->getMockBuilder($class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->container->set($class, $mock);

        return $mock;
    }

    protected function createRequest(
        string $method,
        $uri,
        array $serverParams = []
    ): ServerRequestInterface {
        return (new ServerRequestFactory())->createServerRequest($method, $uri, $serverParams);
    }
}
