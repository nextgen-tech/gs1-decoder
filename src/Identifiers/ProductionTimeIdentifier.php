<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers;

use DateTimeImmutable;
use NGT\Barcode\GS1Decoder\Identifiers\Abstracts\Identifier;

class ProductionTimeIdentifier extends Identifier
{
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'PROD TIME';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Date and time of production';
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return '8008';
    }

    /**
     * @inheritDoc
     */
    public function getLength(): int
    {
        return 12;
    }

    /**
     * @inheritDoc
     */
    public function getFormat(): string
    {
        return '/^\d{8}(\d{2})?(\d{2})?$/';
    }

    /**
     * @inheritDoc
     */
    public function getContent(): ?DateTimeImmutable
    {
        $content = $this->parseDateTime();

        if ($content === false) {
            return null;
        }

        return $content;
    }

    /**
     * Parse the content into DateTimeImmutable.
     *
     * @return  DateTimeImmutable|false
     */
    private function parseDateTime()
    {
        if ($this->content === null) {
            return false;
        }

        if (strlen($this->content) === 8) {
            return DateTimeImmutable::createFromFormat('ymdH', $this->content);
        } elseif (strlen($this->content) === 10) {
            return DateTimeImmutable::createFromFormat('ymdHi', $this->content);
        } elseif (strlen($this->content) === 12) {
            return DateTimeImmutable::createFromFormat('ymdHis', $this->content);
        }

        return false;
    }
}
