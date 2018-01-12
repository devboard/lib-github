<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\Verification;

/**
 * @see \spec\DevboardLib\GitHub\Commit\Verification\VerificationPayloadSpec
 * @see \Tests\DevboardLib\GitHub\Commit\Verification\VerificationPayloadTest
 */
class VerificationPayload
{
    /** @var string */
    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function getValue(): string
    {
        return $this->payload;
    }

    public function __toString(): string
    {
        return $this->payload;
    }

    public function serialize(): string
    {
        return $this->payload;
    }

    public static function deserialize(string $payload): self
    {
        return new self($payload);
    }
}
