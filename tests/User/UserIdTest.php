<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\User\UserId
 * @group  unit
 */
class UserIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var UserId */
    private $sut;

    public function setUp()
    {
        $this->id  = 583231;
        $this->sut = new UserId($this->id);
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
