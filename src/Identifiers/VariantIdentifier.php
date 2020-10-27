<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class VariantIdentifier extends Identifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'VARIANT';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Internal product variant';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '20';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 2;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return '/^\d{2}$/';
    }
}
