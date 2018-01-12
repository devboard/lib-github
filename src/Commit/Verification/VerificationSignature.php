<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\Verification;

/**
 * @see \spec\DevboardLib\GitHub\Commit\Verification\VerificationSignatureSpec
 * @see \Tests\DevboardLib\GitHub\Commit\Verification\VerificationSignatureTest
 */
class VerificationSignature
{
    /** @var string */
    private $signature;

    public function __construct(string $signature)
    {
        $this->signature = $signature;
    }

    public function getSignature(): string
    {
        return $this->signature;
    }

    public function getValue(): string
    {
        return $this->signature;
    }

    public function __toString(): string
    {
        return $this->signature;
    }

    public function serialize(): string
    {
        return $this->signature;
    }

    public static function deserialize(string $signature): self
    {
        return new self($signature);
    }
}
