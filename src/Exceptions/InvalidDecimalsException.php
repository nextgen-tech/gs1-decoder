<?php

declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Exceptions;

use InvalidArgumentException;

class InvalidDecimalsException extends InvalidArgumentException
{
    public static function toLow($code, $decimals): self
    {
        return new self(
            sprintf(
                'Application Identifier "%1$s%2$s" is invalid. The decimals "%2$s" is to low.',
                $code,
                $decimals
            )
        );
    }

    public static function toHigh($code, $decimals): self
    {
        return new self(
            sprintf(
                'Application Identifier "%1$s%2$s" is invalid. The decimals "%2$s" is to high.',
                $code,
                $decimals
            )
        );
    }
}
