<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder;

use NGT\Barcode\GS1Decoder\Contracts\Identifier;
use NGT\Barcode\GS1Decoder\Contracts\Identifiers\VariableLength;
use NGT\Barcode\GS1Decoder\Exceptions\InvalidBarcode;
use NGT\Barcode\GS1Decoder\Exceptions\InvalidDecimalsException;
use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\FloatIdentifier;

class Decoder
{
    /**
     * The data delimiter.
     *
     * @var  string
     */
    private $delimiter;

    /**
     * The barcode to decode.
     *
     * @var  string
     */
    private $barcode;

    /**
     * The current identifier.
     *
     * @var  string
     */
    private $identifierCode;

    final public function __construct(string $delimiter = '[FNC1]')
    {
        $this->delimiter = $delimiter;
    }

    public static function make(string $delimiter = '[FNC1]'): self
    {
        return new static($delimiter);
    }

    public function setDelimiter(string $delimiter): self
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    public function decode(string $barcode): Barcode
    {
        $barcode = new Barcode($barcode, $this->delimiter);

        $this->identifierCode = '';
        $this->barcode        = $barcode->value();

        do {
            $identifier = $this->getIdentifier();

            if ($identifier === null) {
                continue;
            }

            if ($identifier instanceof FloatIdentifier) {
                $decimals = (int) $this->shift(1);
                $this->validateDecimals($identifier, $decimals);
                $identifier->setDecimals($decimals);
            }

            $content = $this->getContent($identifier);

            if ($content === null) {
                continue;
            }

            $this->setContent($identifier, $content);

            $barcode->identifiers()->add($identifier);
        } while (strlen($this->barcode) > 0);

        if ($this->identifierCode === $barcode->value()) {
            throw new InvalidBarcode($barcode->value());
        }

        return $barcode;
    }

    private function shift(int $amount): string
    {
        $value = substr($this->barcode, 0, $amount);

        $this->barcode = substr($this->barcode, $amount);

        return $value;
    }

    private function endsWithDelimiter(string $value): bool
    {
        return substr($this->barcode, strlen($value), strlen($this->delimiter)) === $this->delimiter;
    }

    protected function getIdentifier(): ?Identifier
    {
        $this->identifierCode .= $this->shift(1);

        $identifier = ApplicationIdentifiers::get($this->identifierCode);

        if ($identifier !== null) {
            $this->identifierCode = '';
        }

        return $identifier;
    }

    protected function getContent(Identifier $identifier): ?string
    {
        $value = '';

        if (!$identifier instanceof VariableLength) {
            return substr($this->barcode, 0, $identifier->getLength());
        }

        for ($i = 0; $i < $identifier->getLength(); $i++) {
            if (strlen($value) === strlen($this->barcode)) {
                return $value;
            }

            $value .= $this->barcode[$i];

            if ($this->endsWithDelimiter($value)) {
                return $value;
            }
        }

        return null;
    }

    public function setContent(Identifier $identifier, string $content): void
    {
        $identifier->setContent($content);

        $shiftAmount = strlen($content);

        if ($this->endsWithDelimiter($content)) {
            $shiftAmount += strlen($this->delimiter);
        }

        $this->shift($shiftAmount);
    }

    private function validateDecimals(FloatIdentifier $identifier, int $decimals): void
    {
        if ($decimals < $identifier->getMinDecimals()) {
            throw InvalidDecimalsException::toLow($identifier->getCode(), $decimals);
        }

        if ($decimals > $identifier->getMaxDecimals()) {
            throw InvalidDecimalsException::toHigh($identifier->getCode(), $decimals);
        }
    }
}
