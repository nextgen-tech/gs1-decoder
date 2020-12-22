<?php

declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Exceptions;

use InvalidArgumentException;

class InvalidDecimalsException extends InvalidArgumentException
{
    public static function toLow(string $code, int $decimals): self
    {
        return new self(
            sprintf(
                'Application Identifier "%1$s%2$d" is invalid. The decimals "%2$d" is to low.',
                $code,
                $decimals
            )
        );
    }

    public static function toHigh(string $code, int $decimals): self
    {
        return new self(
            sprintf(
                'Application Identifier "%1$s%2$d" is invalid. The decimals "%2$d" is to high.',
                $code,
                $decimals
            )
        );
    }
}
