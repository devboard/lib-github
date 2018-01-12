<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Issue;

/**
 * @see \spec\DevboardLib\GitHub\Issue\IssueNumberSpec
 * @see \Tests\DevboardLib\GitHub\Issue\IssueNumberTest
 */
class IssueNumber
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
