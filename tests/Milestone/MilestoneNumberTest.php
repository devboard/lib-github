<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Milestone;

use DevboardLib\GitHub\Milestone\MilestoneNumber;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Milestone\MilestoneNumber
 * @group  unit
 */
class MilestoneNumberTest extends TestCase
{
    /** @var int */
    private $value;

    /** @var MilestoneNumber */
    private $sut;

    public function setUp(): void
    {
        $this->value = 1;
        $this->sut   = new MilestoneNumber($this->value);
    }

    public function testGetValue(): void
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame((string) $this->value, $this->sut->asString());
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
