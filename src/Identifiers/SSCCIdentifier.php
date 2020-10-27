<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class SSCCIdentifier extends Identifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'SSCC';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Serial Shipping Container Code';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '00';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 18;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return '/^\d{18}$/';
    }
}
