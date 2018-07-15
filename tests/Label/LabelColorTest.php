<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Label;

use DevboardLib\GitHub\Label\LabelColor;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Label\LabelColor
 * @group  unit
 */
class LabelColorTest extends TestCase
{
    /** @var string */
    private $color;

    /** @var LabelColor */
    private $sut;

    public function setUp(): void
    {
        $this->color = 'color';
        $this->sut   = new LabelColor($this->color);
    }

    public function testGetColor(): void
    {
        self::assertSame($this->color, $this->sut->getColor());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->color, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->color, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->color, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->color));
    }
}
