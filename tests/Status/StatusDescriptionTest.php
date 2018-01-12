<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Status;

use DevboardLib\GitHub\Status\StatusDescription;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Status\StatusDescription
 * @group  todo
 */
class StatusDescriptionTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var StatusDescription */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new StatusDescription($this->value);
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
