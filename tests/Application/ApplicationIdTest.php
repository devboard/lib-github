<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Application;

use DevboardLib\GitHub\Application\ApplicationId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Application\ApplicationId
 * @group  unit
 */
class ApplicationIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var ApplicationId */
    private $sut;

    public function setUp(): void
    {
        $this->id  = 177;
        $this->sut = new ApplicationId($this->id);
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
