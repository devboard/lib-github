<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\Verification\VerificationSignature
 * @group  unit
 */
class VerificationSignatureTest extends TestCase
{
    /** @var string */
    private $signature;

    /** @var VerificationSignature */
    private $sut;

    public function setUp(): void
    {
        $this->signature = '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----';
        $this->sut       = new VerificationSignature($this->signature);
    }

    public function testGetSignature(): void
    {
        self::assertSame($this->signature, $this->sut->getSignature());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->signature, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->signature, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->signature, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->signature));
    }
}
