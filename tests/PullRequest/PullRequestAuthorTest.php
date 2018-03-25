<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\PullRequest\PullRequestAuthor;
use DevboardLib\GitHub\PullRequest\PullRequestAuthorAssociation;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestAuthor
 * @group  todo
 */
class PullRequestAuthorTest extends TestCase
{
    /** @var AccountId */
    private $userId;

    /** @var AccountLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var PullRequestAuthorAssociation|null */
    private $association;

    /** @var AccountAvatarUrl */
    private $avatarUrl;

    /** @var GravatarId */
    private $gravatarId;

    /** @var AccountHtmlUrl */
    private $htmlUrl;

    /** @var AccountApiUrl */
    private $apiUrl;

    /** @var bool */
    private $siteAdmin;

    /** @var PullRequestAuthor */
    private $sut;

    public function setUp()
    {
        $this->userId      = new AccountId(583231);
        $this->login       = new AccountLogin('octocat');
        $this->type        = new AccountType('User');
        $this->association = new PullRequestAuthorAssociation('NONE');
        $this->avatarUrl   = new AccountAvatarUrl('https://avatars3.githubusercontent.com/u/583231?v=4');
        $this->gravatarId  = new GravatarId('');
        $this->htmlUrl     = new AccountHtmlUrl('https://github.com/octocat');
        $this->apiUrl      = new AccountApiUrl('https://api.github.com/users/octocat');
        $this->siteAdmin   = false;
        $this->sut         = new PullRequestAuthor(
            $this->userId,
            $this->login,
            $this->type,
            $this->association,
            $this->avatarUrl,
            $this->gravatarId,
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

    public function testGetAssociation()
    {
        self::assertSame($this->association, $this->sut->getAssociation());
    }

    public function testGetAvatarUrl()
    {
        self::assertSame($this->avatarUrl, $this->sut->getAvatarUrl());
    }

    public function testGetGravatarId()
    {
        self::assertSame($this->gravatarId, $this->sut->getGravatarId());
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
            'gravatarId'  => '',
            'htmlUrl'     => 'https://github.com/octocat',
            'apiUrl'      => 'https://api.github.com/users/octocat',
            'siteAdmin'   => false,
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, PullRequestAuthor::deserialize(json_decode($serialized, true)));
    }
}
