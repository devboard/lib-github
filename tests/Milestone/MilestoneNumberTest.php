<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Milestone;

use DevboardLib\GitHub\Milestone\MilestoneNumber;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Milestone\MilestoneNumber
 * @group  todo
 */
class MilestoneNumberTest extends TestCase
{
    /** @var int */
    private $value;

    /** @var MilestoneNumber */
    private $sut;

    public function setUp()
    {
        $this->value = 1;
        $this->sut   = new MilestoneNumber($this->value);
    }

    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame((string) $this->value, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->value));
    }
}
