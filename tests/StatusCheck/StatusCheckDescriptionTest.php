<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck;

use DevboardLib\GitHub\StatusCheck\StatusCheckDescription;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\StatusCheckDescription
 * @group  unit
 */
class StatusCheckDescriptionTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var StatusCheckDescription */
    private $sut;

    public function setUp(): void
    {
        $this->value = 'value';
        $this->sut   = new StatusCheckDescription($this->value);
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
