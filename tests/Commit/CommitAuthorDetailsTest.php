<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitAuthorDetails
 * @group  unit
 */
class CommitAuthorDetailsTest extends TestCase
{
    /** @var UserId */
    private $userId;

    /** @var UserLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var UserAvatarUrl */
    private $avatarUrl;

    /** @var UserHtmlUrl */
    private $htmlUrl;

    /** @var UserApiUrl */
    private $apiUrl;

    /** @var bool */
    private $siteAdmin;

    /** @var CommitAuthorDetails */
    private $sut;

    public function setUp()
    {
        $this->userId    = new UserId(6752317);
        $this->login     = new UserLogin('baxterthehacker');
        $this->type      = new AccountType('User');
        $this->avatarUrl = new UserAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3');
        $this->htmlUrl   = new UserHtmlUrl('https://github.com/baxterthehacker');
        $this->apiUrl    = new UserApiUrl('https://api.github.com/users/baxterthehacker');
        $this->siteAdmin = false;
        $this->sut       = new CommitAuthorDetails(
            $this->userId,
            $this->login,
            $this->type,
            $this->avatarUrl,
            $this->htmlUrl,
            $this->apiUrl,
            $this->siteAdmin
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

    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
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

            'htmlUrl'   => 'https://github.com/baxterthehacker',
            'apiUrl'    => 'https://api.github.com/users/baxterthehacker',
            'siteAdmin' => false,
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitAuthorDetails::deserialize(json_decode($serialized, true)));
    }
}
