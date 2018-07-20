<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestNumberSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestNumberTest
 */
class PullRequestNumber
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function asInt(): int
    {
        return $this->value;
    }

    public function asString(): string
    {
        return (string) $this->value;
    }

    /**
     * @deprecated Please use `asString()`
     */
    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function serialize(): int
    {
        return $this->value;
    }

    public static function deserialize(int $value): self
    {
        return new self($value);
    }
}
