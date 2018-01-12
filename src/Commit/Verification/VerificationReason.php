<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\Verification;

/**
 * @see \spec\DevboardLib\GitHub\Commit\Verification\VerificationReasonSpec
 * @see \Tests\DevboardLib\GitHub\Commit\Verification\VerificationReasonTest
 */
class VerificationReason
{
    /** @var string */
    private $reason;

    public function __construct(string $reason)
    {
        $this->reason = $reason;
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    public function getValue(): string
    {
        return $this->reason;
    }

    public function __toString(): string
    {
        return $this->reason;
    }

    public function serialize(): string
    {
        return $this->reason;
    }

    public static function deserialize(string $reason): self
    {
        return new self($reason);
    }
}
