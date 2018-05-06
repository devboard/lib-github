<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\PullRequest\PullRequestRequestedReviewer;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestRequestedReviewer
 * @group  unit
 */
class PullRequestRequestedReviewerTest extends TestCase
{
    /** @var UserId */
    private $userId;

    /** @var UserLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var UserAvatarUrl */
    private $avatarUrl;

    /** @var bool */
    private $siteAdmin;

    /** @var PullRequestRequestedReviewer */
    private $sut;

    public function setUp()
    {
        $this->userId    = new UserId(6752317);
        $this->login     = new UserLogin('baxterthehacker');
        $this->type      = new AccountType('User');
        $this->avatarUrl = new UserAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3');
        $this->siteAdmin = false;
        $this->sut       = new PullRequestRequestedReviewer(
            $this->userId, $this->login, $this->type, $this->avatarUrl, $this->siteAdmin
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

    public function testGetAvatarUrl()
    {
        self::assertSame($this->avatarUrl, $this->sut->getAvatarUrl());
    }

    public function testIsSiteAdmin()
    {
        self::assertSame($this->siteAdmin, $this->sut->isSiteAdmin());
    }

    public function testSerialize()
    {
        $expected = [
            'userId'    => 6752317,
            'login'     => 'baxterthehacker',
            'type'      => 'User',
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
            'siteAdmin' => false,
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, PullRequestRequestedReviewer::deserialize(json_decode($serialized, true)));
    }
}