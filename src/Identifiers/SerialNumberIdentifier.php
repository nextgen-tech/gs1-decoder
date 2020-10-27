<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Contracts\Identifiers\VariableLength;
use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class SerialNumberIdentifier extends Identifier implements VariableLength
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'SERIAL';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Serial number';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '21';
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
