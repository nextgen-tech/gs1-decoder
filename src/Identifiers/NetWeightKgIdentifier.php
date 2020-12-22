<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\FloatIdentifier;

final class NetWeightKgIdentifier extends FloatIdentifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'NET WEIGHT (kg)';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Net weight, kilograms';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '310';
    }

    /**
     * @inheritDoc
     */
    public function getMinDecimals(): int
    {
        return 0;
    }

    /**
     * @inheritDoc
     */
    public function getMaxDecimals(): int
    {
        return 5;
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 6;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return '/^\d{6}$/';
    }
}
