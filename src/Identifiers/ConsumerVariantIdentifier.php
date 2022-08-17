<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class ConsumerVariantIdentifier extends Identifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'CONSUMER VARIANT';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Consumer product variant';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '22';
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

