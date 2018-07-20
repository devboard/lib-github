<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\StatusCheck;

/**
 * @see \spec\DevboardLib\GitHub\StatusCheck\StatusCheckContextSpec
 * @see \Tests\DevboardLib\GitHub\StatusCheck\StatusCheckContextTest
 */
class StatusCheckContext
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

    public function asString(): string
    {
        return $this->description;
    }

    /**
     * @deprecated Please use `asString()`
     */
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
