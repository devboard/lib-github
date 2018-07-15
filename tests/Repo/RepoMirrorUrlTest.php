<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoMirrorUrl
 * @group  unit
 */
class RepoMirrorUrlTest extends TestCase
{
    /** @var string */
    private $mirrorUrl;

    /** @var RepoMirrorUrl */
    private $sut;

    public function setUp(): void
    {
        $this->mirrorUrl = 'http://mirror.example.com';
        $this->sut       = new RepoMirrorUrl($this->mirrorUrl);
    }

    public function testGetMirrorUrl(): void
    {
        self::assertSame($this->mirrorUrl, $this->sut->getMirrorUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->mirrorUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->mirrorUrl, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->mirrorUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->mirrorUrl));
    }
}
