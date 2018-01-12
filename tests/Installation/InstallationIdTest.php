<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationId
 * @group  todo
 */
class InstallationIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var InstallationId */
    private $sut;

    public function setUp()
    {
        $this->id  = 25235;
        $this->sut = new InstallationId($this->id);
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
