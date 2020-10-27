<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class ContentIdentifier extends Identifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'CONTENT';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'GTIN of contained trade items';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '02';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 14;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return '/^\d{14}$/';
    }
}
