<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\CommitMessage;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubBranch
 * @group  unit
 */
class GitHubBranchTest extends TestCase
{
    /** @var RepoFullName */
    private $repoFullName;

    /** @var BranchName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var bool|null */
    private $protected;

    /** @var BranchProtectionUrl|null */
    private $protectionUrl;

    /** @var GitHubBranch */
    private $sut;

    public function setUp()
    {
        $this->repoFullName = new RepoFullName(new AccountLogin('devboard-test'), new RepoName('Hello-World'));
        $this->name         = new BranchName('master');
        $this->commit       = new GitHubCommit(
            new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'),
            new CommitMessage('A commit message'),
            new CommitDate('2018-01-02T11:12:13+00:00'),
            new CommitAuthor(
                new AuthorName('Amy Johnson'),
                new EmailAddress('amy@example.com'),
                new CommitDate('2018-01-02T11:12:13+00:00'),
                new CommitAuthorDetails(
                    new UserId(583231),
                    new UserLogin('octocat'),
                    new AccountType('Bot'),
                    new UserAvatarUrl('https://avatars3.githubusercontent.com/u/583231?v=4'),
                    true
                )
            ),
            new CommitCommitter(
                new CommitterName('Amy Johnson'),
                new EmailAddress('amy@example.com'),
                new CommitDate('2018-01-02T11:12:13+00:00'),
                new CommitCommitterDetails(
                    new UserId(583231),
                    new UserLogin('octocat'),
                    new AccountType('Bot'),
                    new UserAvatarUrl('https://avatars3.githubusercontent.com/u/583231?v=4'),
                    true
                )
            ),
            new CommitTree(new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3')),
            new CommitParentCollection([new CommitParent(new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'))]),
            new CommitVerification(
                new VerificationVerified(false),
                new VerificationReason('valid'),
                new VerificationSignature('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----'),
                new VerificationPayload('tree 691272480426f78a0138979dd3ce63b77f706feb\n...')
            )
        );
        $this->protected     = false;
        $this->protectionUrl = new BranchProtectionUrl('protectionUrl');
        $this->sut           = new GitHubBranch(
            $this->repoFullName, $this->name, $this->commit, $this->protected, $this->protectionUrl
        );
    }

    public function testGetRepoFullName()
    {
        self::assertSame($this->repoFullName, $this->sut->getRepoFullName());
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetCommit()
    {
        self::assertSame($this->commit, $this->sut->getCommit());
    }

    public function testIsProtected()
    {
        self::assertSame($this->protected, $this->sut->isProtected());
    }

    public function testGetProtectionUrl()
    {
        self::assertSame($this->protectionUrl, $this->sut->getProtectionUrl());
    }

    public function testHasProtected()
    {
        self::assertTrue($this->sut->hasProtected());
    }

    public function testHasProtectionUrl()
    {
        self::assertTrue($this->sut->hasProtectionUrl());
    }

    public function testSerialize()
    {
        $expected = [
            'repoFullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World'],
            'name'         => 'master',
            'commit'       => [
                'sha'        => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                'message'    => 'A commit message',
                'commitDate' => '2018-01-02T11:12:13+00:00',
                'author'     => [
                    'name'          => 'Amy Johnson',
                    'email'         => 'amy@example.com',
                    'commitDate'    => '2018-01-02T11:12:13+00:00',
                    'authorDetails' => [
                        'userId'    => 583231,
                        'login'     => 'octocat',
                        'type'      => 'Bot',
                        'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                        'siteAdmin' => true,
                    ],
                ],
                'committer' => [
                    'name'             => 'Amy Johnson',
                    'email'            => 'amy@example.com',
                    'commitDate'       => '2018-01-02T11:12:13+00:00',
                    'committerDetails' => [
                        'userId'    => 583231,
                        'login'     => 'octocat',
                        'type'      => 'Bot',
                        'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                        'siteAdmin' => true,
                    ],
                ],
                'tree'         => ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3'],
                'parents'      => [['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3']],
                'verification' => [
                    'verified'  => false,
                    'reason'    => 'valid',
                    'signature' => '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----',
                    'payload'   => 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...',
                ],
            ],
            'protected'     => false,
            'protectionUrl' => 'protectionUrl',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubBranch::deserialize(json_decode($serialized, true)));
    }
}
