<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Milestone;

/**
 * @see \spec\DevboardLib\GitHub\Milestone\MilestoneNumberSpec
 * @see \Tests\DevboardLib\GitHub\Milestone\MilestoneNumberTest
 */
class MilestoneNumber
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
