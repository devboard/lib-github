<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthor;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociation;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthor
 * @group  todo
 */
class PullRequestReviewAuthorTest extends TestCase
{
    /** @var AccountId */
    private $userId;

    /** @var AccountLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var PullRequestReviewAuthorAssociation|null */
    private $association;

    /** @var AccountAvatarUrl */
    private $avatarUrl;

    /** @var bool */
    private $siteAdmin;

    /** @var PullRequestReviewAuthor */
    private $sut;

    public function setUp()
    {
        $this->userId      = new AccountId(583231);
        $this->login       = new AccountLogin('octocat');
        $this->type        = new AccountType('User');
        $this->association = new PullRequestReviewAuthorAssociation('NONE');
        $this->avatarUrl   = new AccountAvatarUrl('https://avatars3.githubusercontent.com/u/583231?v=4');

        $this->siteAdmin = false;
        $this->sut       = new PullRequestReviewAuthor(
            $this->userId, $this->login, $this->type, $this->association, $this->avatarUrl, $this->siteAdmin
        );
    }

    public function testGetUserId()
    {
        self::assertSame($this->userId, $this->sut->getUserId());
    }

    public function testGetLogin()
    {
        self::assertSame($this->login, $this->sut->getLogin());
    }

    public function testGetType()
    {
        self::assertSame($this->type, $this->sut->getType());
    }

    public function testGetAssociation()
    {
        self::assertSame($this->association, $this->sut->getAssociation());
    }

    public function testGetAvatarUrl()
    {
        self::assertSame($this->avatarUrl, $this->sut->getAvatarUrl());
    }

    public function testIsSiteAdmin()
    {
        self::assertSame($this->siteAdmin, $this->sut->isSiteAdmin());
    }

    public function testHasAssociation()
    {
        self::assertTrue($this->sut->hasAssociation());
    }

    public function testSerialize()
    {
        $expected = [
            'userId'      => 583231,
            'login'       => 'octocat',
            'type'        => 'User',
            'association' => 'NONE',
            'avatarUrl'   => 'https://avatars3.githubusercontent.com/u/583231?v=4',

            'siteAdmin' => false,
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, PullRequestReviewAuthor::deserialize(json_decode($serialized, true)));
    }
}
