<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\Verification\VerificationVerified
 * @group  unit
 */
class VerificationVerifiedTest extends TestCase
{
    /** @var bool */
    private $verified;

    /** @var VerificationVerified */
    private $sut;

    public function setUp()
    {
        $this->verified = true;
        $this->sut      = new VerificationVerified($this->verified);
    }

    public function testIsVerified()
    {
        self::assertSame($this->verified, $this->sut->isVerified());
    }

    public function testGetValue()
    {
        self::assertSame($this->verified, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame('true', $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->verified, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->verified));
    }
}
