<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Exceptions;

use InvalidArgumentException;

class InvalidBarcode extends InvalidArgumentException
{
    /**
     * The invalid barcode value.
     *
     * @var  string
     */
    protected $barcode;

    /**
     * The exception constructor.
     *
     * @param  string  $barcode
     */
    public function __construct(string $barcode)
    {
        parent::__construct("Invalid barcode with \"{$barcode}\" value.");

        $this->barcode = $barcode;
    }

    /**
     * Get the invalid barcode value.
     *
     * @return  string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }
}
