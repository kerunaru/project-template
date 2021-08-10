<?php declare(strict_types=1);

namespace App\Domain\Emoji\Exception;

use DomainException;
use Throwable;

class InvalidEmojiCodeException extends DomainException
{
    private const MESSAGE = 'The emoji code is not allowed.';

    private function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }

    public static function build(): self
    {
        return new self();
    }
}
