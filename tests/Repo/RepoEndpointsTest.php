<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoEndpoints
 * @group  unit
 */
class RepoEndpointsTest extends TestCase
{
    /** @var RepoHtmlUrl */
    private $htmlUrl;

    /** @var RepoApiUrl */
    private $apiUrl;

    /** @var RepoGitUrl */
    private $gitUrl;

    /** @var RepoSshUrl */
    private $sshUrl;

    /** @var RepoEndpoints */
    private $sut;

    public function setUp(): void
    {
        $this->htmlUrl = new RepoHtmlUrl('https://github.com/octocat/Hello-World');
        $this->apiUrl  = new RepoApiUrl('https://api.github.com/repos/octocat/Hello-World');
        $this->gitUrl  = new RepoGitUrl('git://github.com/octocat/Hello-World.git');
        $this->sshUrl  = new RepoSshUrl('git@github.com:octocat/Hello-World.git');
        $this->sut     = new RepoEndpoints($this->htmlUrl, $this->apiUrl, $this->gitUrl, $this->sshUrl);
    }

    public function testGetGitUrl(): void
    {
        self::assertSame($this->gitUrl, $this->sut->getGitUrl());
    }

    public function testGetSshUrl(): void
    {
        self::assertSame($this->sshUrl, $this->sut->getSshUrl());
    }

    public function testSerialize(): void
    {
        $expected = [
            'htmlUrl' => 'https://github.com/octocat/Hello-World',
            'apiUrl'  => 'https://api.github.com/repos/octocat/Hello-World',
            'gitUrl'  => 'git://github.com/octocat/Hello-World.git',
            'sshUrl'  => 'git@github.com:octocat/Hello-World.git',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoEndpoints::deserialize(json_decode($serialized, true)));
    }
}
