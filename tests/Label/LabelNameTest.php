<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Label;

use DevboardLib\GitHub\Label\LabelName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Label\LabelName
 * @group  todo
 */
class LabelNameTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var LabelName */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new LabelName($this->value);
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
