<?php declare(strict_types=1);

use App\Test\Traits\AppTestTrait;
use Fig\Http\Message\StatusCodeInterface;
use PHPUnit\Framework\TestCase;

final class HomeControllerTest extends TestCase
{
    use AppTestTrait;

    public const HTML_CONTENT = <<<HTML
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Página principal</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
	</head>
	<body>
		<section class="section">
		<div class="container">
			<h1 class="title">
				¡Hola mundo!
			</h1>
			<p class="subtitle">
				Ésta plantilla está en <code>src/view</code>. Edítala cómo estimes oportuno. &#128512;
			</p>
		</div>
	</section>
	</body>
</html>

HTML;

    /**
     * @test
     */
    public function index(): void
    {
        $request = $this->createRequest('GET', '/');

        $response = $this->app->handle($request);

        $this->assertSame(StatusCodeInterface::STATUS_OK, $response->getStatusCode());
        $this->assertSame((string) $response->getBody(), self::HTML_CONTENT);
    }
}
