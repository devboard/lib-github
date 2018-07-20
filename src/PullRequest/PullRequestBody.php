<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestBodySpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestBodyTest
 */
class PullRequestBody
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

    public function asString(): string
    {
        return $this->value;
    }

    /**
     * @deprecated Please use `asString()`
     */
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
