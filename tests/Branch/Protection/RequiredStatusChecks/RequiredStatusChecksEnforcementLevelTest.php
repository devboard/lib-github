<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel
 * @group  unit
 */
class RequiredStatusChecksEnforcementLevelTest extends TestCase
{
    /** @var string */
    private $enforcementLevel;

    /** @var RequiredStatusChecksEnforcementLevel */
    private $sut;

    public function setUp(): void
    {
        $this->enforcementLevel = 'enforcementLevel';
        $this->sut              = new RequiredStatusChecksEnforcementLevel($this->enforcementLevel);
    }

    public function testGetEnforcementLevel(): void
    {
        self::assertSame($this->enforcementLevel, $this->sut->getEnforcementLevel());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->enforcementLevel, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->enforcementLevel, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->enforcementLevel, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->enforcementLevel));
    }
}
