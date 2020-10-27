<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

final class GTINIdentifier extends Identifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'GTIN';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Global Trade Item Number';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '01';
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
