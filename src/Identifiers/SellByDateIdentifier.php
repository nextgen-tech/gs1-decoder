<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\DateIdentifier;

class SellByDateIdentifier extends DateIdentifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'SELL BY';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Sell by date';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '16';
    }
}
