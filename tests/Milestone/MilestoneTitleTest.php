<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Milestone;

use DevboardLib\GitHub\Milestone\MilestoneTitle;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Milestone\MilestoneTitle
 * @group  unit
 */
class MilestoneTitleTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var MilestoneTitle */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new MilestoneTitle($this->value);
    }

    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->value, $this->sut->__toString());
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
