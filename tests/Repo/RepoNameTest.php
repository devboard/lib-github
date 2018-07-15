<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoName
 * @group  unit
 */
class RepoNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var RepoName */
    private $sut;

    public function setUp(): void
    {
        $this->name = 'linguist';
        $this->sut  = new RepoName($this->name);
    }

    public function testGetName(): void
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->name, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->name, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->name, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->name));
    }
}
