<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Contracts\Identifiers;

interface WithDecimals
{
    /**
     * Set the amount of decimals.
     *
     * @param  int  $decimals
     */
    public function setDecimals(int $decimals): self;

    /**
     * Get the amount of decimals.
     *
     * @return  int
     */
    public function getDecimals(): int;
}
