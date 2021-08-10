<?php declare(strict_types=1);

namespace App\Application\UseCase\Home;

use App\Domain\Emoji\EmojiFactory;
use App\Domain\Emoji\VO\Emoji;
use Exception;

class GetRandomEmojiUseCase
{
    /** @throws Exception */
    public function execute(): Emoji
    {
        return EmojiFactory::buildRandom();
    }
}
