<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl
 * @group  unit
 */
class RepoSshUrlTest extends TestCase
{
    /** @var string */
    private $sshUrl;

    /** @var RepoSshUrl */
    private $sut;

    public function setUp(): void
    {
        $this->sshUrl = 'git@github.com:octocat/linguist.git';
        $this->sut    = new RepoSshUrl($this->sshUrl);
    }

    public function testGetSshUrl(): void
    {
        self::assertSame($this->sshUrl, $this->sut->getSshUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->sshUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->sshUrl, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->sshUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->sshUrl));
    }
}
