<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\CommitMessage;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitApiUrl;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitHtmlUrl;
use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\GitHubTag;
use DevboardLib\GitHub\GitHubTagCollection;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubTagCollection
 * @group  todo
 */
class GitHubTagCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var GitHubTagCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
            new GitHubTag(
                new RepoFullName(new AccountLogin('devboard-test'), new RepoName('Hello-World')),
                new TagName('3.x'),
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
                            new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                            new UserHtmlUrl('https://github.com/octocat'),
                            new UserApiUrl('https://api.github.com/users/octocat'),
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
                            new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                            new UserHtmlUrl('https://github.com/octocat'),
                            new UserApiUrl('https://api.github.com/users/octocat'),
                            true
                        )
                    ),
                    new CommitTree(
                        new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'),
                        new TreeApiUrl(
                            'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2'
                        )
                    ),
                    new CommitParentCollection(
                        [
                            new CommitParent(
                                new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'),
                                new ParentApiUrl('apiUrl'),
                                new ParentHtmlUrl('htmlUrl')
                            ),
                        ]
                    ),
                    new CommitVerification(
                        new VerificationVerified(false),
                        new VerificationReason('valid'),
                        new VerificationSignature('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----'),
                        new VerificationPayload('tree 691272480426f78a0138979dd3ce63b77f706feb\n...')
                    ),
                    new CommitApiUrl(
                        'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47'
                    ),
                    new CommitHtmlUrl(
                        'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47'
                    )
                )
            ),
        ];
        $this->sut = new GitHubTagCollection($this->elements);
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
