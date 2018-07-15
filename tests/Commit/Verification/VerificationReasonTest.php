<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\Verification\VerificationReason
 * @group  unit
 */
class VerificationReasonTest extends TestCase
{
    /** @var string */
    private $reason;

    /** @var VerificationReason */
    private $sut;

    public function setUp(): void
    {
        $this->reason = 'expired_key';
        $this->sut    = new VerificationReason($this->reason);
    }

    public function testGetReason(): void
    {
        self::assertSame($this->reason, $this->sut->getReason());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->reason, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->reason, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->reason, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->reason));
    }
}
