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
use DevboardLib\GitHub\GitHubCommitCollection;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubCommitCollection
 * @group  unit
 */
class GitHubCommitCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var GitHubCommitCollection */
    private $sut;

    public function setUp(): void
    {
        $this->elements = [
            new GitHubCommit(
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
                new CommitParentCollection(
                    [new CommitParent(new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'))]
                ),
                new CommitVerification(
                    new VerificationVerified(false),
                    new VerificationReason('valid'),
                    new VerificationSignature('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----'),
                    new VerificationPayload('tree 691272480426f78a0138979dd3ce63b77f706feb\n...')
                )
            ),
        ];
        $this->sut = new GitHubCommitCollection($this->elements);
    }

    public function testGetElements(): void
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize(): void
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
