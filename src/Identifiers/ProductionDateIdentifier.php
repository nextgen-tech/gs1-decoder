<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\DateIdentifier;

class ProductionDateIdentifier extends DateIdentifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'PROD DATE';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Production date';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '11';
    }
}
