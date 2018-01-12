<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use PhpSpec\ObjectBehavior;

class CommitVerificationSpec extends ObjectBehavior
{
    public function let(
        VerificationVerified $verified,
        VerificationReason $reason,
        VerificationSignature $signature,
        VerificationPayload $payload
    ) {
        $this->beConstructedWith($verified, $reason, $signature, $payload);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitVerification::class);
    }

    public function it_exposes_verified(VerificationVerified $verified)
    {
        $this->getVerified()->shouldReturn($verified);
    }

    public function it_exposes_reason(VerificationReason $reason)
    {
        $this->getReason()->shouldReturn($reason);
    }

    public function it_exposes_signature(VerificationSignature $signature)
    {
        $this->getSignature()->shouldReturn($signature);
    }

    public function it_exposes_payload(VerificationPayload $payload)
    {
        $this->getPayload()->shouldReturn($payload);
    }

    public function it_has_signature()
    {
        $this->hasSignature()->shouldReturn(true);
    }

    public function it_has_payload()
    {
        $this->hasPayload()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        VerificationVerified $verified,
        VerificationReason $reason,
        VerificationSignature $signature,
        VerificationPayload $payload
    ) {
        $verified->serialize()->shouldBeCalled()->willReturn(false);
        $reason->serialize()->shouldBeCalled()->willReturn('valid');
        $signature->serialize()->shouldBeCalled()->willReturn(
            '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----'
        );
        $payload->serialize()->shouldBeCalled()->willReturn('tree 691272480426f78a0138979dd3ce63b77f706feb\n...');
        $this->serialize()->shouldReturn(
            [
                'verified'  => false,
                'reason'    => 'valid',
                'signature' => '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----',
                'payload'   => 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'verified'  => false,
            'reason'    => 'valid',
            'signature' => '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----',
            'payload'   => 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitVerification::class);
    }
}
