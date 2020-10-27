<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Contracts\Identifiers\VariableLength;
use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class OriginIdentifier extends Identifier implements VariableLength
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'ORIGIN';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Country of origin of a trade item';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '422';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 3;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return '/^\d{3}$/';
    }
}
