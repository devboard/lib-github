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

    public function setUp()
    {
        $this->name = 'linguist';
        $this->sut  = new RepoName($this->name);
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetValue()
    {
        self::assertSame($this->name, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->name, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->name, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->name));
    }
}
