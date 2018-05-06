<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\PullRequest\PullRequestHead;
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
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestHead
 * @group  unit
 */
class PullRequestHeadTest extends TestCase
{
    /** @var BranchName */
    private $targetBranchName;

    /** @var GitHubRepo|null */
    private $repo;

    /** @var CommitSha */
    private $sha;

    /** @var PullRequestHead */
    private $sut;

    public function setUp()
    {
        $this->targetBranchName = new BranchName('name');
        $this->repo             = new GitHubRepo(
            new RepoId(1296269),
            new RepoFullName(new AccountLogin('value'), new RepoName('Hello-World')),
            new RepoOwner(
                new AccountId(1),
                new AccountLogin('value'),
                AccountType::USER(),
                new AccountAvatarUrl('avatarUrl'),
                true
            ),
            true,
            new BranchName('name'),
            true,
            new RepoParent(
                new RepoId(1296269), new RepoFullName(new AccountLogin('value'), new RepoName('Hello-World'))
            ),
            new RepoDescription(
                'Language Savant. If your repository language is being reported incorrectly, send us a pull request!'
            ),
            new RepoHomepage('http://www.example.com/'),
            new RepoLanguage('HTML'),
            new RepoMirrorUrl('http://mirror.example.com'),
            true,
            new RepoEndpoints(
                new RepoHtmlUrl('https://github.com/octocat/linguist'),
                new RepoApiUrl('https://api.github.com/repos/octocat/linguist'),
                new RepoGitUrl('git://github.com/octocat/linguist.git'),
                new RepoSshUrl('git@github.com:octocat/linguist.git')
            ),
            new RepoStats(11, 12, 13, 14, 15, new RepoSize(32899)),
            new RepoTimestamps(
                new RepoCreatedAt('2016-08-02T17:35:14+00:00'),
                new RepoUpdatedAt('2017-11-16T14:01:57+00:00'),
                new RepoPushedAt('2017-11-17T10:26:15+00:00')
            )
        );
        $this->sha = new CommitSha('sha');
        $this->sut = new PullRequestHead($this->targetBranchName, $this->repo, $this->sha);
    }

    public function testGetTargetBranchName()
    {
        self::assertSame($this->targetBranchName, $this->sut->getTargetBranchName());
    }

    public function testGetRepo()
    {
        self::assertSame($this->repo, $this->sut->getRepo());
    }

    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testHasRepo()
    {
        self::assertTrue($this->sut->hasRepo());
    }

    public function testSerialize()
    {
        $expected = [
            'targetBranchName' => 'name',
            'repo'             => [
                'id'       => 1296269,
                'fullName' => ['owner' => 'value', 'repoName' => 'Hello-World'],
                'owner'    => [
                    'userId'    => 1,
                    'login'     => 'value',
                    'type'      => 'User',
                    'avatarUrl' => 'avatarUrl',
                    'siteAdmin' => true,
                ],
                'private'       => true,
                'defaultBranch' => 'name',
                'fork'          => true,
                'parent'        => ['id' => 1296269, 'fullName' => ['owner' => 'value', 'repoName' => 'Hello-World']],
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
            ],
            'sha' => 'sha',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, PullRequestHead::deserialize(json_decode($serialized, true)));
    }
}
