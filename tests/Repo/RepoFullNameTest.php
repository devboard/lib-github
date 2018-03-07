<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoFullName
 * @group  unit
 */
class RepoFullNameTest extends TestCase
{
    /** @var AccountLogin */
    private $owner;

    /** @var RepoName */
    private $repoName;

    /** @var RepoFullName */
    private $sut;

    public function setUp()
    {
        $this->owner    = new AccountLogin('octocat');
        $this->repoName = new RepoName('linguist');
        $this->sut      = new RepoFullName($this->owner, $this->repoName);
    }

    public function testGetOwner()
    {
        self::assertSame($this->owner, $this->sut->getOwner());
    }

    public function testGetRepoName()
    {
        self::assertSame($this->repoName, $this->sut->getRepoName());
    }

    public function testSerialize()
    {
        $expected = ['owner' => 'octocat', 'repoName' => 'linguist'];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoFullName::deserialize(json_decode($serialized, true)));
    }
}
