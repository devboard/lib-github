<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status;

/**
 * @see \spec\DevboardLib\GitHub\Status\StatusDescriptionSpec
 * @see \Tests\DevboardLib\GitHub\Status\StatusDescriptionTest
 */
class StatusDescription
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function serialize(): string
    {
        return $this->value;
    }

    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
