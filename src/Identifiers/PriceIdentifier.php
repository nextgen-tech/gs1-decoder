<?php

declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Contracts\Identifiers\VariableLength;
use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\FloatIdentifier;

final class PriceIdentifier extends FloatIdentifier implements VariableLength
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'PRICE';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Applicable amount payable, single monetary area (variable measure trade item)';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '392';
    }

    /**
     * @inheritDoc
     */
    public function getMinDecimals(): int
    {
        return 0;
    }

    /**
     * @inheritDoc
     */
    public function getMaxDecimals(): int
    {
        return 9;
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 15;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return $this->standardFormat('1,15');
    }
}
