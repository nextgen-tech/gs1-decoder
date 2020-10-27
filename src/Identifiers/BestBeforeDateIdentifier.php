<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\DateIdentifier;

class BestBeforeDateIdentifier extends DateIdentifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'BEST BEFORE';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Best before date';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '15';
    }
}
