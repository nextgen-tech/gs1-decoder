<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\DateIdentifier;

class ExpirationDateIdentifier extends DateIdentifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'USE BY';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Expiration date';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '17';
    }
}
