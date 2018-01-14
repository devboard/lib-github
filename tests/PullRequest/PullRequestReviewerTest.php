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
use DevboardLib\GitHub\PullRequest\PullRequestReviewer;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestReviewer
 * @group  todo
 */
class PullRequestReviewerTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|AccountId */
    private $userId;

    /** @var MockInterface|AccountLogin */
    private $login;

    /** @var MockInterface|AccountType */
    private $gitHubAccountType;

    /** @var MockInterface|AccountAvatarUrl */
    private $avatarUrl;

    /** @var MockInterface|GravatarId */
    private $gravatarId;

    /** @var MockInterface|AccountHtmlUrl */
    private $htmlUrl;

    /** @var MockInterface|AccountApiUrl */
    private $apiUrl;

    /** @var bool */
    private $siteAdmin;

    /** @var PullRequestReviewer */
    private $pullRequestReviewer;

    public function setUp()
    {
        $this->userId              = Mockery::mock(AccountId::class);
        $this->login               = Mockery::mock(AccountLogin::class);
        $this->gitHubAccountType   = Mockery::mock(AccountType::class);
        $this->avatarUrl           = Mockery::mock(AccountAvatarUrl::class);
        $this->gravatarId          = Mockery::mock(GravatarId::class);
        $this->htmlUrl             = Mockery::mock(AccountHtmlUrl::class);
        $this->apiUrl              = Mockery::mock(AccountApiUrl::class);
        $this->siteAdmin           = true;
        $this->pullRequestReviewer = new PullRequestReviewer(
            $this->userId,
            $this->login,
            $this->gitHubAccountType,
            $this->avatarUrl,
            $this->gravatarId,
            $this->htmlUrl,
            $this->apiUrl,
            $this->siteAdmin
        );
    }

    public function testGetUserId()
    {
        self::assertEquals($this->userId, $this->pullRequestReviewer->getUserId());
    }

    public function testGetLogin()
    {
        self::assertEquals($this->login, $this->pullRequestReviewer->getLogin());
    }

    public function testGetAccountType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetAvatarUrl()
    {
        self::assertEquals($this->avatarUrl, $this->pullRequestReviewer->getAvatarUrl());
    }

    public function testGetGravatarId()
    {
        self::assertEquals($this->gravatarId, $this->pullRequestReviewer->getGravatarId());
    }

    public function testGetHtmlUrl()
    {
        self::assertEquals($this->htmlUrl, $this->pullRequestReviewer->getHtmlUrl());
    }

    public function testGetApiUrl()
    {
        self::assertEquals($this->apiUrl, $this->pullRequestReviewer->getApiUrl());
    }

    public function testIsSiteAdmin()
    {
        self::assertEquals($this->siteAdmin, $this->pullRequestReviewer->isSiteAdmin());
    }

    public function testSerialize()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testDeserialize()
    {
        $this->markTestSkipped('Skipping');
    }
}
