<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Contracts\Identifiers\VariableLength;
use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class BatchLotIdentifier extends Identifier implements VariableLength
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'BATCH/LOT';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Batch or lot number';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '10';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 20;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return $this->standardFormat('1,20');
    }
}
