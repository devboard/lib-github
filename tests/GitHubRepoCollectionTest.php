<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\GitHubRepoCollection;
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
 * @covers \DevboardLib\GitHub\GitHubRepoCollection
 * @group  todo
 */
class GitHubRepoCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var GitHubRepoCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
            new GitHubRepo(
                new RepoId(1296269),
                new RepoFullName(new AccountLogin('devboard-test'), new RepoName('Hello-World')),
                new RepoOwner(
                    new AccountId(6752317),
                    new AccountLogin('devboard-test'),
                    new AccountType('Bot'),
                    new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
                    new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                    new AccountHtmlUrl('https://github.com/baxterthehacker'),
                    new AccountApiUrl('https://api.github.com/users/baxterthehacker'),
                    false
                ),
                true,
                new BranchName('production'),
                true,
                new RepoParent(
                    new RepoId(1296269),
                    new RepoFullName(new AccountLogin('devboard-test'), new RepoName('Hello-World'))
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
            ),
        ];
        $this->sut = new GitHubRepoCollection($this->elements);
    }

    public function testGetElements()
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize()
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
