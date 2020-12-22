<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Identifiers\Abstracts;

use NGT\Barcode\GS1Decoder\Contracts\Identifier as IdentifierContract;

abstract class Identifier implements IdentifierContract
{
    /**
     * The identifier content.
     *
     * @var  string|null
     */
    protected $content;

    /**
     * @inheritDoc
     */
    abstract public function getTitle(): string;

    /**
     * @inheritDoc
     */
    abstract public function getName(): string;

    /**
     * @inheritDoc
     */
    abstract public function getCode(): string;

    /**
     * @inheritDoc
     */
    abstract public function getLength(): int;

    /**
     * @inheritDoc
     */
    final public function copy(): IdentifierContract
    {
        return clone $this;
    }

    /**
     * @inheritDoc
     */
    final public function setContent(string $content): IdentifierContract
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @inheritDoc
     */
    final public function getRawContent(): ?string
    {
        return $this->content;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'code'        => $this->getCode(),
            'title'       => $this->getTitle(),
            'name'        => $this->getName(),
            'length'      => $this->getLength(),
            'content'     => $this->getContent(),
            'raw_content' => $this->getRawContent(),
        ];
    }

    /**
     * The base identifier format compatible with GS1 Application Identifier
     * standard.
     *
     * @param   string  $amount
     * @return  string
     */
    protected function standardFormat(string $amount): string
    {
        return '/^[\!\"\%\&\'\(\)\*\+\,\-\.\/0-9\:\;\<\=\>\?A-Z\_a-z]{' . preg_quote($amount, '/') . '}$/';
    }
}
