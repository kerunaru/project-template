<?php declare(strict_types=1);

namespace App\Domain\Emoji\VO;

use App\Domain\Emoji\Exception\InvalidEmojiCodeException;

class Emoji
{
    public const ALLOWED_CODES = [
        '&#128512;' => true,
        '&#128513;' => true,
        '&#128515;' => true,
        '&#128516;' => true,
        '&#128521;' => true,
        '&#128522;' => true,
        '&#128578;' => true,
    ];

    private string $code;

    public function __construct(string $code)
    {
        if (!isset(self::ALLOWED_CODES[$code])) {
            throw InvalidEmojiCodeException::build();
        }

        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
