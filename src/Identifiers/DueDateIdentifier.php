<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\DateIdentifier;

class DueDateIdentifier extends DateIdentifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'DUE DATE';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Due date';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '12';
    }
}
