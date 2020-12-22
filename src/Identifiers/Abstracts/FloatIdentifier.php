<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers\Abstracts;

use NGT\Barcode\GS1Decoder\Contracts\Identifiers\WithDecimals;

abstract class FloatIdentifier extends Identifier implements WithDecimals
{
    /**
     * The number of decimals in content.
     *
     * @var  int
     */
    protected $decimals;

    /**
     * @inheritDoc
     */
    public function setDecimals(int $decimals): WithDecimals
    {
        $this->decimals = $decimals;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getDecimals(): int
    {
        return $this->decimals;
    }

    /**
     * @inheritDoc
     */
    final public function getContent(): float
    {
        return $this->content / pow(10, $this->decimals);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return parent::toArray() + [
            'decimals' => $this->getDecimals(),
        ];
    }
}
