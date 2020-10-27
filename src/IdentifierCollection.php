<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder;

use InvalidArgumentException;
use NGT\Barcode\GS1Decoder\Contracts\Identifier;

class IdentifierCollection
{
    /**
     * The list of identifiers.
     *
     * @var  \NGT\Barcode\GS1Decoder\Contracts\Identifier[]
     */
    private $identifiers = [];

    /**
     * Get the list of all identifiers.
     *
     * @return  \NGT\Barcode\GS1Decoder\Contracts\Identifier[]
     */
    public function all(): array
    {
        return $this->identifiers;
    }

    /**
     * Add the identifier to barcode.
     *
     * @param  \NGT\Barcode\GS1Decoder\Contracts\Identifier  $identifier
     */
    public function add(Identifier $identifier): self
    {
        $this->identifiers[$identifier->getCode()] = $identifier;

        return $this;
    }

    /**
     * Check whether identifier exists in barcode or not.
     *
     * @param   string  $code
     * @return  bool
     */
    public function has(string $code): bool
    {
        return array_key_exists($code, $this->identifiers);
    }

    /**
     * Get the identifier by code.
     *
     * @param   string  $code
     * @return  \NGT\Barcode\GS1Decoder\Contracts\Identifier
     * @throws  InvalidArgumentException
     */
    public function get(string $code): Identifier
    {
        if ($this->has($code)) {
            return $this->identifiers[$code];
        }

        throw new InvalidArgumentException("Missing identifier with code \"{$code}\".");
    }
}
