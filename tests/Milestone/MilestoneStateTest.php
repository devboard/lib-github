<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Milestone;

use DevboardLib\GitHub\Milestone\MilestoneState;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Milestone\MilestoneState
 * @group  unit
 */
class MilestoneStateTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var MilestoneState */
    private $sut;

    public function setUp(): void
    {
        $this->value = 'open';
        $this->sut   = new MilestoneState($this->value);
    }

    public function testGetValue(): void
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->value, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->value));
    }
}
