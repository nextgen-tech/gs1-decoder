<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Contracts\Identifiers\VariableLength;
use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class VariableCountIdentifier extends Identifier implements VariableLength
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'VAR. COUNT';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Variable count of items';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '30';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 8;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return '/^\d{1,8}$/';
    }
}

