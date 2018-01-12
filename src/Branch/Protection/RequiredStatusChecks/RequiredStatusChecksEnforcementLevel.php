<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

/**
 * @see \spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevelSpec
 * @see \Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevelTest
 */
class RequiredStatusChecksEnforcementLevel
{
    /** @var string */
    private $enforcementLevel;

    public function __construct(string $enforcementLevel)
    {
        $this->enforcementLevel = $enforcementLevel;
    }

    public function getEnforcementLevel(): string
    {
        return $this->enforcementLevel;
    }

    public function getValue(): string
    {
        return $this->enforcementLevel;
    }

    public function __toString(): string
    {
        return $this->enforcementLevel;
    }

    public function serialize(): string
    {
        return $this->enforcementLevel;
    }

    public static function deserialize(string $enforcementLevel): self
    {
        return new self($enforcementLevel);
    }
}
