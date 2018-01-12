<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status;

/**
 * @see \spec\DevboardLib\GitHub\Status\StatusContextSpec
 * @see \Tests\DevboardLib\GitHub\Status\StatusContextTest
 */
class StatusContext
{
    /** @var string */
    private $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getValue(): string
    {
        return $this->description;
    }

    public function __toString(): string
    {
        return $this->description;
    }

    public function serialize(): string
    {
        return $this->description;
    }

    public static function deserialize(string $description): self
    {
        return new self($description);
    }
}
