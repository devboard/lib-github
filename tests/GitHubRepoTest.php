<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoHomepage;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoLanguage;
use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoPushedAt;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubRepo
 * @group  unit
 */
class GitHubRepoTest extends TestCase
{
    /** @var RepoId */
    private $id;

    /** @var RepoFullName */
    private $fullName;

    /** @var RepoOwner */
    private $owner;

    /** @var bool */
    private $private;

    /** @var BranchName */
    private $defaultBranch;

    /** @var bool */
    private $fork;

    /** @var RepoParent|null */
    private $parent;

    /** @var RepoDescription|null */
    private $description;

    /** @var RepoHomepage|null */
    private $homepage;

    /** @var RepoLanguage|null */
    private $language;

    /** @var RepoMirrorUrl|null */
    private $mirrorUrl;

    /** @var bool|null */
    private $archived;

    /** @var RepoEndpoints */
    private $endpoints;

    /** @var RepoStats */
    private $stats;

    /** @var RepoTimestamps */
    private $timestamps;

    /** @var GitHubRepo */
    private $sut;

    public function setUp()
    {
        $this->id       = new RepoId(1296269);
        $this->fullName = new RepoFullName(new AccountLogin('devboard-test'), new RepoName('Hello-World'));
        $this->owner    = new RepoOwner(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            false
        );
        $this->private       = true;
        $this->defaultBranch = new BranchName('production');
        $this->fork          = true;
        $this->parent        = new RepoParent(
            new RepoId(1296269), new RepoFullName(new AccountLogin('devboard-test'), new RepoName('Hello-World'))
        );
        $this->description = new RepoDescription(
            'Language Savant. If your repository language is being reported incorrectly, send us a pull request!'
        );
        $this->homepage  = new RepoHomepage('http://www.example.com/');
        $this->language  = new RepoLanguage('HTML');
        $this->mirrorUrl = new RepoMirrorUrl('http://mirror.example.com');
        $this->archived  = true;
        $this->endpoints = new RepoEndpoints(
            new RepoHtmlUrl('https://github.com/octocat/linguist'),
            new RepoApiUrl('https://api.github.com/repos/octocat/linguist'),
            new RepoGitUrl('git://github.com/octocat/linguist.git'),
            new RepoSshUrl('git@github.com:octocat/linguist.git')
        );
        $this->stats      = new RepoStats(11, 12, 13, 14, 15, new RepoSize(32899));
        $this->timestamps = new RepoTimestamps(
            new RepoCreatedAt('2016-08-02T17:35:14+00:00'),
            new RepoUpdatedAt('2017-11-16T14:01:57+00:00'),
            new RepoPushedAt('2017-11-17T10:26:15+00:00')
        );
        $this->sut = new GitHubRepo(
            $this->id,
            $this->fullName,
            $this->owner,
            $this->private,
            $this->defaultBranch,
            $this->fork,
            $this->parent,
            $this->description,
            $this->homepage,
            $this->language,
            $this->mirrorUrl,
            $this->archived,
            $this->endpoints,
            $this->stats,
            $this->timestamps
        );
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetFullName()
    {
        self::assertSame($this->fullName, $this->sut->getFullName());
    }

    public function testGetRepoOwnerName()
    {
        self::assertEquals(new AccountLogin('devboard-test'), $this->sut->getRepoOwnerName());
    }

    public function testGetRepoName()
    {
        self::assertEquals(new RepoName('Hello-World'), $this->sut->getRepoName());
    }

    public function testGetOwner()
    {
        self::assertSame($this->owner, $this->sut->getOwner());
    }

    public function testIsPrivate()
    {
        self::assertSame($this->private, $this->sut->isPrivate());
    }

    public function testGetDefaultBranch()
    {
        self::assertSame($this->defaultBranch, $this->sut->getDefaultBranch());
    }

    public function testIsFork()
    {
        self::assertSame($this->fork, $this->sut->isFork());
    }

    public function testGetParent()
    {
        self::assertSame($this->parent, $this->sut->getParent());
    }

    public function testGetDescription()
    {
        self::assertSame($this->description, $this->sut->getDescription());
    }

    public function testGetHomepage()
    {
        self::assertSame($this->homepage, $this->sut->getHomepage());
    }

    public function testGetLanguage()
    {
        self::assertSame($this->language, $this->sut->getLanguage());
    }

    public function testGetMirrorUrl()
    {
        self::assertSame($this->mirrorUrl, $this->sut->getMirrorUrl());
    }

    public function testIsArchived()
    {
        self::assertSame($this->archived, $this->sut->isArchived());
    }

    public function testGetEndpoints()
    {
        self::assertSame($this->endpoints, $this->sut->getEndpoints());
    }

    public function testGetStats()
    {
        self::assertSame($this->stats, $this->sut->getStats());
    }

    public function testGetTimestamps()
    {
        self::assertSame($this->timestamps, $this->sut->getTimestamps());
    }

    public function testHasParent()
    {
        self::assertTrue($this->sut->hasParent());
    }

    public function testHasDescription()
    {
        self::assertTrue($this->sut->hasDescription());
    }

    public function testHasHomepage()
    {
        self::assertTrue($this->sut->hasHomepage());
    }

    public function testHasLanguage()
    {
        self::assertTrue($this->sut->hasLanguage());
    }

    public function testHasMirrorUrl()
    {
        self::assertTrue($this->sut->hasMirrorUrl());
    }

    public function testHasArchived()
    {
        self::assertTrue($this->sut->hasArchived());
    }

    public function testSerialize()
    {
        $expected = [
            'id'       => 1296269,
            'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World'],
            'owner'    => [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                'siteAdmin' => false,
            ],
            'private'       => true,
            'defaultBranch' => 'production',
            'fork'          => true,
            'parent'        => ['id' => 1296269, 'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World']],
            'description'   => 'Language Savant. If your repository language is being reported incorrectly, send us a pull request!',
            'homepage'      => 'http://www.example.com/',
            'language'      => 'HTML',
            'mirrorUrl'     => 'http://mirror.example.com',
            'archived'      => true,
            'endpoints'     => [
                'htmlUrl' => 'https://github.com/octocat/linguist',
                'apiUrl'  => 'https://api.github.com/repos/octocat/linguist',
                'gitUrl'  => 'git://github.com/octocat/linguist.git',
                'sshUrl'  => 'git@github.com:octocat/linguist.git',
            ],
            'stats' => [
                'networkCount'     => 11,
                'watchersCount'    => 12,
                'stargazersCount'  => 13,
                'subscribersCount' => 14,
                'openIssuesCount'  => 15,
                'size'             => 32899,
            ],
            'timestamps' => [
                'createdAt' => '2016-08-02T17:35:14+00:00',
                'updatedAt' => '2017-11-16T14:01:57+00:00',
                'pushedAt'  => '2017-11-17T10:26:15+00:00',
            ],
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubRepo::deserialize(json_decode($serialized, true)));
    }
}
