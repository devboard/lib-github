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

    public function setUp(): void
    {
        $this->homepage = 'http://www.example.com/';
        $this->sut      = new RepoHomepage($this->homepage);
    }

    public function testGetHomepage(): void
    {
        self::assertSame($this->homepage, $this->sut->getHomepage());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->homepage, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->homepage, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->homepage, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->homepage));
    }
}
