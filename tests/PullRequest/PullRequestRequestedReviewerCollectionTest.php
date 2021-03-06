<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\PullRequest\PullRequestRequestedReviewer;
use DevboardLib\GitHub\PullRequest\PullRequestRequestedReviewerCollection;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestRequestedReviewerCollection
 * @group  unit
 */
class PullRequestRequestedReviewerCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var PullRequestRequestedReviewerCollection */
    private $sut;

    public function setUp(): void
    {
        $this->elements = [
            new PullRequestRequestedReviewer(
                new UserId(1), new UserLogin('value'), AccountType::USER(), new UserAvatarUrl('avatarUrl'), true
            ),
        ];
        $this->sut = new PullRequestRequestedReviewerCollection($this->elements);
    }

    public function testGetElements(): void
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize(): void
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut::deserialize(json_decode($serializedJson, true)));
    }
}
