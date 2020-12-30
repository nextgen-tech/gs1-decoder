<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Contracts\Identifiers\VariableLength;
use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class CompanyInternalInformationIdentifier extends Identifier implements VariableLength
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'INTERNAL';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Company internal information';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '91';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 90;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return $this->standardFormat('1,90');
    }
}
