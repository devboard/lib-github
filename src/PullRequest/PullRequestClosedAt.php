<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use DateTime;
use RuntimeException;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestClosedAtSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestClosedAtTest
 */
class PullRequestClosedAt extends DateTime
{
    public static function createFromFormat($format, $time, $object = null): self
    {
        $date = parent::createFromFormat($format, $time, $object);

        if (false === $date) {
            throw new RuntimeException('Unparsable date/time');
        }

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
