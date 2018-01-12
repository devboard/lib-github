<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitVerificationSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitVerificationTest
 */
class CommitVerification
{
    /** @var VerificationVerified */
    private $verified;

    /** @var VerificationReason */
    private $reason;

    /** @var VerificationSignature|null */
    private $signature;

    /** @var VerificationPayload|null */
    private $payload;

    public function __construct(
        VerificationVerified $verified,
        VerificationReason $reason,
        ?VerificationSignature $signature,
        ?VerificationPayload $payload
    ) {
        $this->verified  = $verified;
        $this->reason    = $reason;
        $this->signature = $signature;
        $this->payload   = $payload;
    }

    public function hasSignature(): bool
    {
        if (null === $this->signature) {
            return false;
        }

        return true;
    }

    public function hasPayload(): bool
    {
        if (null === $this->payload) {
            return false;
        }

        return true;
    }

    public function getVerified(): VerificationVerified
    {
        return $this->verified;
    }

    public function getReason(): VerificationReason
    {
        return $this->reason;
    }

    public function getSignature(): ?VerificationSignature
    {
        return $this->signature;
    }

    public function getPayload(): ?VerificationPayload
    {
        return $this->payload;
    }

    public function serialize(): array
    {
        if (null === $this->signature) {
            $signature = null;
        } else {
            $signature = $this->signature->serialize();
        }

        if (null === $this->payload) {
            $payload = null;
        } else {
            $payload = $this->payload->serialize();
        }

        return [
            'verified'  => $this->verified->serialize(),
            'reason'    => $this->reason->serialize(),
            'signature' => $signature,
            'payload'   => $payload,
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['signature']) {
            $signature = null;
        } else {
            $signature = VerificationSignature::deserialize($data['signature']);
        }

        if (null === $data['payload']) {
            $payload = null;
        } else {
            $payload = VerificationPayload::deserialize($data['payload']);
        }

        return new self(
            VerificationVerified::deserialize($data['verified']),
            VerificationReason::deserialize($data['reason']),
            $signature,
            $payload
        );
    }
}
