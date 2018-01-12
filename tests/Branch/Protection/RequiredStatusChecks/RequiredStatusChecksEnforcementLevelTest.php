<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel
 * @group  todo
 */
class RequiredStatusChecksEnforcementLevelTest extends TestCase
{
    /** @var string */
    private $enforcementLevel;

    /** @var RequiredStatusChecksEnforcementLevel */
    private $sut;

    public function setUp()
    {
        $this->enforcementLevel = 'enforcementLevel';
        $this->sut              = new RequiredStatusChecksEnforcementLevel($this->enforcementLevel);
    }

    public function testGetEnforcementLevel()
    {
        self::assertSame($this->enforcementLevel, $this->sut->getEnforcementLevel());
    }

    public function testGetValue()
    {
        self::assertSame($this->enforcementLevel, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->enforcementLevel, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->enforcementLevel, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->enforcementLevel));
    }
}
