<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestIdSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestIdTest
 */
class PullRequestId
{
    /** @var int */
    private $id;

    public function __construct(int $id)
    {
        Assert::greaterThan($id, 0, 'PullRequestId has to be greater than 0.');
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function asInt(): int
    {
        return $this->id;
    }

    public function asString(): string
    {
        return (string) $this->id;
    }

    /**
     * @deprecated Please use `asString()`
     */
    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function serialize(): int
    {
        return $this->id;
    }

    public static function deserialize(int $id): self
    {
        return new self($id);
    }
}
