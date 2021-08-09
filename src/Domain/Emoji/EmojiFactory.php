<?php declare(strict_types=1);

namespace App\Domain\Emoji;

use App\Domain\Emoji\VO\Emoji;
use Exception;

class EmojiFactory
{
    /** @throws Exception */
    public static function buildRandom(): Emoji
    {
        $allowedCodes = array_keys(Emoji::ALLOWED_CODES);
        $code = $allowedCodes[random_int(0, count($allowedCodes) - 1)];

        return new Emoji($code);
    }
}
