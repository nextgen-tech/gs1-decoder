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

    /**
     * Get the min supported decimals.
     *
     * @return  int
     */
    public function getMinDecimals(): int;

    /**
     * Get the max supported decimals.
     *
     * @return  int
     */
    public function getMaxDecimals(): int;
}
