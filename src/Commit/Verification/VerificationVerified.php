<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\Verification;

/**
 * @see \spec\DevboardLib\GitHub\Commit\Verification\VerificationVerifiedSpec
 * @see \Tests\DevboardLib\GitHub\Commit\Verification\VerificationVerifiedTest
 */
class VerificationVerified
{
    /** @var bool */
    private $verified;

    public function __construct(bool $verified)
    {
        $this->verified = $verified;
    }

    public function isVerified(): bool
    {
        return $this->verified;
    }

    public function getValue(): bool
    {
        return $this->verified;
    }

    public function __toString(): string
    {
        if (true === $this->verified) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function serialize(): bool
    {
        return $this->verified;
    }

    public static function deserialize(bool $verified): self
    {
        return new self($verified);
    }
}
