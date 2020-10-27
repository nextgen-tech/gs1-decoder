<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\DateIdentifier;

class PackagingDateIdentifier extends DateIdentifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'PACK DATE';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Packaging date';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '13';
    }
}
