<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Label;

use DevboardLib\GitHub\Label\LabelId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Label\LabelId
 * @group  todo
 */
class LabelIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var LabelId */
    private $sut;

    public function setUp()
    {
        $this->id  = 1;
        $this->sut = new LabelId($this->id);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testToString()
    {
        self::assertSame((string) $this->id, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->id));
    }
}
