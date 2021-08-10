<?php declare(strict_types=1);

namespace App\Infrastructure\Slim\Action;

use App\Application\UseCase\Home\GetRandomEmojiUseCase;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\StreamFactory;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeAction extends AbstractAction
{
    private GetRandomEmojiUseCase $getRandomEmojiUseCase;

    public function __construct(Environment $twig, GetRandomEmojiUseCase $anUseCase)
    {
        parent::__construct($twig);

        $this->getRandomEmojiUseCase = $anUseCase;
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @throws Exception
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ): ResponseInterface
    {
        return $response->withBody(
            (new StreamFactory())->createStream(
                $this->twig->render('index.twig',[
                    'emoji' => $this->getRandomEmojiUseCase->execute()
                ])
            )
        );
    }
}
