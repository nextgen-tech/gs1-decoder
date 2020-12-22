<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Contracts;

interface Identifier
{
    /**
     * Get the title of identifier.
     *
     * @return  string
     */
    public function getTitle(): string;

    /**
     * Get the full name of identifier.
     *
     * @return  string
     */
    public function getName(): string;

    /**
     * Get the code of identifier.
     *
     * @return  string
     */
    public function getCode(): string;

    /**
     * Get the length of identifier.
     *
     * @return  int
     */
    public function getLength(): int;

    /**
     * Get the format of identifier.
     *
     * @return  string
     */
    public function getFormat(): string;

    /**
     * Clone the instance of identifier.
     *
     * @return  \NGT\Barcode\GS1Decoder\Contracts\Identifier
     */
    public function copy(): self;

    /**
     * Set the content of identifier.
     *
     * @param  string  $content
     */
    public function setContent(string $content): self;

    /**
     * Get the content of identifier.
     *
     * @return  string|mixed|null
     */
    public function getContent();

    /**
     * Get the raw content of identifier.
     *
     * @return  string|null
     */
    public function getRawContent(): ?string;

    /**
     * Get array representation of identifier.
     *
     * @return  mixed[]
     */
    public function toArray(): array;
}
