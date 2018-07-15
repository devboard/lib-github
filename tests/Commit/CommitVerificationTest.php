<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitVerification
 * @group  unit
 */
class CommitVerificationTest extends TestCase
{
    /** @var VerificationVerified */
    private $verified;

    /** @var VerificationReason */
    private $reason;

    /** @var VerificationSignature|null */
    private $signature;

    /** @var VerificationPayload|null */
    private $payload;

    /** @var CommitVerification */
    private $sut;

    public function setUp(): void
    {
        $this->verified  = new VerificationVerified(false);
        $this->reason    = new VerificationReason('valid');
        $this->signature = new VerificationSignature('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----');
        $this->payload   = new VerificationPayload('tree 691272480426f78a0138979dd3ce63b77f706feb\n...');
        $this->sut       = new CommitVerification($this->verified, $this->reason, $this->signature, $this->payload);
    }

    public function testGetVerified(): void
    {
        self::assertSame($this->verified, $this->sut->getVerified());
    }

    public function testGetReason(): void
    {
        self::assertSame($this->reason, $this->sut->getReason());
    }

    public function testGetSignature(): void
    {
        self::assertSame($this->signature, $this->sut->getSignature());
    }

    public function testGetPayload(): void
    {
        self::assertSame($this->payload, $this->sut->getPayload());
    }

    public function testHasSignature(): void
    {
        self::assertTrue($this->sut->hasSignature());
    }

    public function testHasPayload(): void
    {
        self::assertTrue($this->sut->hasPayload());
    }

    public function testSerialize(): void
    {
        $expected = [
            'verified'  => false,
            'reason'    => 'valid',
            'signature' => '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----',
            'payload'   => 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitVerification::deserialize(json_decode($serialized, true)));
    }
}
