<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo\RepoStats;

use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoStats\RepoSize
 * @group  unit
 */
class RepoSizeTest extends TestCase
{
    /** @var int */
    private $size;

    /** @var RepoSize */
    private $sut;

    public function setUp(): void
    {
        $this->size = 32899;
        $this->sut  = new RepoSize($this->size);
    }

    public function testGetSize(): void
    {
        self::assertSame($this->size, $this->sut->getSize());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->size, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame((string) $this->size, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->size, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->size));
    }
}
