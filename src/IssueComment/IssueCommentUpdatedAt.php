<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\IssueComment;

use DateTime;
use RuntimeException;

/**
 * @see \spec\DevboardLib\GitHub\IssueComment\IssueCommentUpdatedAtSpec
 * @see \Tests\DevboardLib\GitHub\IssueComment\IssueCommentUpdatedAtTest
 */
class IssueCommentUpdatedAt extends DateTime
{
    public static function createFromFormat($format, $time, $object = null): self
    {
        $date = parent::createFromFormat($format, $time, $object);

        if (false === $date) {
            throw new RuntimeException('Unparsable date/time');
        }

        return new self($date->format('c'));
    }

    public function asString(): string
    {
        return $this->format('c');
    }

    /**
     * @deprecated Please use `asString()`
     */
    public function __toString(): string
    {
        return $this->format('c');
    }

    public function serialize(): string
    {
        return $this->asString();
    }

    public static function deserialize($value): self
    {
        return new self($value);
    }
}
