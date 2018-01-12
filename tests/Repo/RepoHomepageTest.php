<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoHomepage;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoHomepage
 * @group  unit
 */
class RepoHomepageTest extends TestCase
{
    /** @var string */
    private $homepage;

    /** @var RepoHomepage */
    private $sut;

    public function setUp()
    {
        $this->homepage = 'http://www.example.com/';
        $this->sut      = new RepoHomepage($this->homepage);
    }

    public function testGetHomepage()
    {
        self::assertSame($this->homepage, $this->sut->getHomepage());
    }

    public function testGetValue()
    {
        self::assertSame($this->homepage, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->homepage, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->homepage, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->homepage));
    }
}
