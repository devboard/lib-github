<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use DateTime;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestCreatedAtSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestCreatedAtTest
 */
class PullRequestCreatedAt extends DateTime
{
    public static function createFromFormat($format, $time, $object = null): self
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }

    public function __toString(): string
    {
        return $this->format('c');
    }

    public function serialize(): string
    {
        return $this->__toString();
    }

    public static function deserialize($value): self
    {
        return new self($value);
    }
}