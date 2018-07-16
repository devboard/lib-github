<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck;

use DevboardLib\GitHub\StatusCheck\StatusCheckId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\StatusCheckId
 * @group  unit
 */
class StatusCheckIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var StatusCheckId */
    private $sut;

    public function setUp(): void
    {
        $this->id  = 1;
        $this->sut = new StatusCheckId($this->id);
    }

    public function testGetId(): void
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testToString(): void
    {
        self::assertSame((string) $this->id, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->id));
    }
}
