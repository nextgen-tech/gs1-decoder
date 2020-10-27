<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers\Abstracts;

use DateTime;
use DateTimeImmutable;

abstract class DateIdentifier extends Identifier
{
    /**
     * @inheritDoc
     */
    final public function getLength(): int
    {
        return 6;
    }

    /**
     * Get the content of identifier.
     *
     * @return  DateTimeImmutable|null
     */
    final public function getContent(): ?DateTimeImmutable
    {
        if ($this->content === null) {
            return null;
        }

        $date       = $this->content;
        $endOfMonth = substr($this->content, -2) === '00';

        if ($endOfMonth) {
            $date = substr($date, 0, 4) . '01';
        }

        $date = DateTime::createFromFormat('ymd', $date);

        if ($date === false) {
            return null;
        }

        if ($endOfMonth) {
            $date->modify('last day of this month');
        }

        $date->setTime(24 - 1, 60 - 1, 60 - 1, 1000000 - 1);

        return  DateTimeImmutable::createFromMutable($date);
    }

    /**
     * @inheritDoc
     */
    final public function getFormat(): string
    {
        return '/^\d{6}$/';
    }
}
