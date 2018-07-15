<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubPullRequestReview;
use DevboardLib\GitHub\GitHubPullRequestReviewCollection;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthor;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociation;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewBody;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewId;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewState;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewSubmittedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubPullRequestReviewCollection
 * @group  unit
 */
class GitHubPullRequestReviewCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var GitHubPullRequestReviewCollection */
    private $sut;

    public function setUp(): void
    {
        $this->elements = [
            new GitHubPullRequestReview(
                new PullRequestReviewId(1),
                new PullRequestReviewBody('value'),
                new PullRequestReviewAuthor(
                    new AccountId(1),
                    new AccountLogin('value'),
                    AccountType::USER(),
                    new PullRequestReviewAuthorAssociation('NONE'),
                    new AccountAvatarUrl('avatarUrl'),
                    true
                ),
                new PullRequestReviewState('commented'),
                new CommitSha('sha'),
                new PullRequestReviewSubmittedAt('2016-09-04T13:23:11+00:00')
            ),
        ];
        $this->sut = new GitHubPullRequestReviewCollection($this->elements);
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
