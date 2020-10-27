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
    private $items = [];

    /**
     * Get the list of all identifiers.
     *
     * @return  \NGT\Barcode\GS1Decoder\Contracts\Identifier[]
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * Add the identifier to barcode.
     *
     * @param  \NGT\Barcode\GS1Decoder\Contracts\Identifier  $identifier
     */
    public function add(Identifier $identifier): self
    {
        $this->items[$identifier->getCode()] = $identifier;

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
        return array_key_exists($code, $this->items);
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
            return $this->items[$code];
        }

        throw new InvalidArgumentException("Missing identifier with code \"{$code}\".");
    }

    /**
     * The array representation of identifiers.
     *
     * @return  mixed[][]
     */
    public function toArray(): array
    {
        $identifiers = [];

        foreach ($this->all() as $key => $identifier) {
            $identifiers[$key] = $identifier->toArray();
        }

        return $identifiers;
    }
}
