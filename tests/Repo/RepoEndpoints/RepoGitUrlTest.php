<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl
 * @group  unit
 */
class RepoGitUrlTest extends TestCase
{
    /** @var string */
    private $gitUrl;

    /** @var RepoGitUrl */
    private $sut;

    public function setUp(): void
    {
        $this->gitUrl = 'git://github.com/octocat/linguist.git';
        $this->sut    = new RepoGitUrl($this->gitUrl);
    }

    public function testGetGitUrl(): void
    {
        self::assertSame($this->gitUrl, $this->sut->getGitUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->gitUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->gitUrl, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->gitUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->gitUrl));
    }
}
