<?php

declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class PricePerUnitIdentifier extends Identifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'PRICE PER UNIT';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Price per unit of measure';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '8005';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 6;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return '/^\d{6}$/';
    }
}
