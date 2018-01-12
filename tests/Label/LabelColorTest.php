<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Label;

use DevboardLib\GitHub\Label\LabelColor;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Label\LabelColor
 * @group  todo
 */
class LabelColorTest extends TestCase
{
    /** @var string */
    private $color;

    /** @var LabelColor */
    private $sut;

    public function setUp()
    {
        $this->color = 'color';
        $this->sut   = new LabelColor($this->color);
    }

    public function testGetColor()
    {
        self::assertSame($this->color, $this->sut->getColor());
    }

    public function testGetValue()
    {
        self::assertSame($this->color, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->color, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->color, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->color));
    }
}
