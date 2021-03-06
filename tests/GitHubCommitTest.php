<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\CommitMessage;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Account\AccountType;
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
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubCommit
 * @group  unit
 */
class GitHubCommitTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var CommitMessage */
    private $message;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitAuthor */
    private $author;

    /** @var CommitCommitter */
    private $committer;

    /** @var CommitTree */
    private $tree;

    /** @var CommitParentCollection */
    private $parents;

    /** @var CommitVerification|null */
    private $verification;

    /** @var GitHubCommit */
    private $sut;

    public function setUp(): void
    {
        $this->sha        = new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
        $this->message    = new CommitMessage('A commit message');
        $this->commitDate = new CommitDate('2018-01-02T11:12:13+00:00');
        $this->author     = new CommitAuthor(
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
        );
        $this->committer = new CommitCommitter(
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
        );
        $this->tree    = new CommitTree(new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'));
        $this->parents = new CommitParentCollection(
            [new CommitParent(new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'))]
        );
        $this->verification = new CommitVerification(
            new VerificationVerified(false),
            new VerificationReason('valid'),
            new VerificationSignature('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----'),
            new VerificationPayload('tree 691272480426f78a0138979dd3ce63b77f706feb\n...')
        );

        $this->sut = new GitHubCommit(
            $this->sha,
            $this->message,
            $this->commitDate,
            $this->author,
            $this->committer,
            $this->tree,
            $this->parents,
            $this->verification
        );
    }

    public function testGetSha(): void
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testGetMessage(): void
    {
        self::assertSame($this->message, $this->sut->getMessage());
    }

    public function testGetCommitDate(): void
    {
        self::assertSame($this->commitDate, $this->sut->getCommitDate());
    }

    public function testGetAuthor(): void
    {
        self::assertSame($this->author, $this->sut->getAuthor());
    }

    public function testGetCommitter(): void
    {
        self::assertSame($this->committer, $this->sut->getCommitter());
    }

    public function testGetTree(): void
    {
        self::assertSame($this->tree, $this->sut->getTree());
    }

    public function testGetParents(): void
    {
        self::assertSame($this->parents, $this->sut->getParents());
    }

    public function testGetVerification(): void
    {
        self::assertSame($this->verification, $this->sut->getVerification());
    }

    public function testHasVerification(): void
    {
        self::assertTrue($this->sut->hasVerification());
    }

    public function testSerialize(): void
    {
        $expected = [
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
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubCommit::deserialize(json_decode($serialized, true)));
    }
}
