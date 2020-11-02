<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Exceptions;

use InvalidArgumentException;

class MissingIdentifier extends InvalidArgumentException
{
    /**
     * The missing identifier code.
     *
     * @var  string
     */
    protected $identifierCode;

    /**
     * The exception constructor.
     *
     * @param  string  $identifierCode
     */
    public function __construct(string $identifierCode)
    {
        parent::__construct("Missing identifier with \"{$identifierCode}\" code.");

        $this->identifierCode = $identifierCode;
    }

    /**
     * Get the missing identifier code.
     *
     * @return  string
     */
    public function getIdentifierCode(): string
    {
        return $this->identifierCode;
    }
}
