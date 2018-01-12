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

    public function setUp()
    {
        $this->sshUrl = 'git@github.com:octocat/linguist.git';
        $this->sut    = new RepoSshUrl($this->sshUrl);
    }

    public function testGetSshUrl()
    {
        self::assertSame($this->sshUrl, $this->sut->getSshUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->sshUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->sshUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->sshUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->sshUrl));
    }
}
