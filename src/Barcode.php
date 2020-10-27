<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder;

use JsonSerializable;

class Barcode implements JsonSerializable
{
    /**
     * The barcode value.
     *
     * @var  string
     */
    private $value;

    /**
     * The barcode data delimiter.
     *
     * @var  string
     */
    private $delimiter;

    /**
     * The identifiers collection.
     *
     * @var  \NGT\Barcode\GS1Decoder\IdentifierCollection
     */
    private $identifiers;

    /**
     * The barcode constructor.
     *
     * @param  string  $value
     * @param  string  $delimiter
     */
    public function __construct(string $value, string $delimiter)
    {
        $this->value     = $value;
        $this->delimiter = $delimiter;

        $this->identifiers = new IdentifierCollection();
    }

    /**
     * Get the barcode value.
     *
     * @return  string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * Get the barcode data delimiter.
     *
     * @return  string
     */
    public function delimiter(): string
    {
        return $this->delimiter;
    }

    /**
     * Get the collection of barcode identifiers.
     *
     * @return  \NGT\Barcode\GS1Decoder\IdentifierCollection
     */
    public function identifiers(): IdentifierCollection
    {
        return $this->identifiers;
    }

    /**
     * The array representation of barcode.
     *
     * @return  mixed[]
     */
    public function toArray(): array
    {
        return [
            'value'       => $this->value(),
            'delimiter'   => $this->delimiter(),
            'identifiers' => $this->identifiers()->toArray(),
        ];
    }

    /**
     * The data which should be serialized to JSON.
     *
     * @return  mixed[][]
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
