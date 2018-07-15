<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Label;

use DevboardLib\GitHub\Label\LabelName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Label\LabelName
 * @group  unit
 */
class LabelNameTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var LabelName */
    private $sut;

    public function setUp(): void
    {
        $this->value = 'value';
        $this->sut   = new LabelName($this->value);
    }

    public function testGetValue(): void
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->value, $this->sut->__toString());
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
