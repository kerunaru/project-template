<?php declare(strict_types=1);

namespace App\Test\Infrastructure\Slim\Action;

use App\Test\Traits\AppTestTrait;
use Fig\Http\Message\StatusCodeInterface;
use PHPUnit\Framework\TestCase;

final class HomeActionTest extends TestCase
{
    use AppTestTrait;

    /** @test */
    public function index(): void
    {
        $request = $this->createRequest('GET', '/');

        $response = $this->app->handle($request);

        $this->assertSame(StatusCodeInterface::STATUS_OK, $response->getStatusCode());
    }
}
