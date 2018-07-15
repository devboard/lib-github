<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Application\ApplicationId;
use DevboardLib\GitHub\GitHubInstallation;
use DevboardLib\GitHub\Installation\InstallationAccessTokenUrl;
use DevboardLib\GitHub\Installation\InstallationAccount;
use DevboardLib\GitHub\Installation\InstallationCreatedAt;
use DevboardLib\GitHub\Installation\InstallationEvents;
use DevboardLib\GitHub\Installation\InstallationHtmlUrl;
use DevboardLib\GitHub\Installation\InstallationId;
use DevboardLib\GitHub\Installation\InstallationPermissions;
use DevboardLib\GitHub\Installation\InstallationRepositoriesUrl;
use DevboardLib\GitHub\Installation\InstallationRepositorySelection;
use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected;
use DevboardLib\GitHub\Installation\InstallationUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubInstallation
 * @group  unit
 */
class GitHubInstallationTest extends TestCase
{
    /** @var InstallationId */
    private $installationId;

    /** @var InstallationAccount */
    private $installationAccount;

    /** @var ApplicationId */
    private $applicationId;

    /** @var InstallationRepositorySelection|null */
    private $repositorySelection;

    /** @var InstallationPermissions */
    private $permissions;

    /** @var InstallationEvents */
    private $events;

    /** @var InstallationAccessTokenUrl */
    private $accessTokenUrl;

    /** @var InstallationRepositoriesUrl */
    private $repositoriesUrl;

    /** @var InstallationHtmlUrl */
    private $htmlUrl;

    /** @var InstallationCreatedAt */
    private $createdAt;

    /** @var InstallationUpdatedAt */
    private $updatedAt;

    /** @var GitHubInstallation */
    private $sut;

    public function setUp(): void
    {
        $this->installationId      = new InstallationId(25235);
        $this->installationAccount = new InstallationAccount(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            false
        );
        $this->applicationId       = new ApplicationId(177);
        $this->repositorySelection = new InstallationRepositorySelected();
        $this->permissions         = new InstallationPermissions(
            ['0' => 'some-installation-permission', '1' => 'another-installation-permission']
        );
        $this->events          = new InstallationEvents(['0' => 'some-installation-event', '1' => 'another-installation-event']);
        $this->accessTokenUrl  = new InstallationAccessTokenUrl('access-token-url');
        $this->repositoriesUrl = new InstallationRepositoriesUrl('installationRepositoriesUrl');
        $this->htmlUrl         = new InstallationHtmlUrl('installationHtmlUrl');
        $this->createdAt       = new InstallationCreatedAt('2016-08-02T17:35:14+00:00');
        $this->updatedAt       = new InstallationUpdatedAt('2016-08-03T11:31:05+00:00');
        $this->sut             = new GitHubInstallation(
            $this->installationId,
            $this->installationAccount,
            $this->applicationId,
            $this->repositorySelection,
            $this->permissions,
            $this->events,
            $this->accessTokenUrl,
            $this->repositoriesUrl,
            $this->htmlUrl,
            $this->createdAt,
            $this->updatedAt
        );
    }

    public function testGetInstallationId(): void
    {
        self::assertSame($this->installationId, $this->sut->getInstallationId());
    }

    public function testGetInstallationAccount(): void
    {
        self::assertSame($this->installationAccount, $this->sut->getInstallationAccount());
    }

    public function testGetApplicationId(): void
    {
        self::assertSame($this->applicationId, $this->sut->getApplicationId());
    }

    public function testGetRepositorySelection(): void
    {
        self::assertSame($this->repositorySelection, $this->sut->getRepositorySelection());
    }

    public function testGetPermissions(): void
    {
        self::assertSame($this->permissions, $this->sut->getPermissions());
    }

    public function testGetEvents(): void
    {
        self::assertSame($this->events, $this->sut->getEvents());
    }

    public function testGetAccessTokenUrl(): void
    {
        self::assertSame($this->accessTokenUrl, $this->sut->getAccessTokenUrl());
    }

    public function testGetRepositoriesUrl(): void
    {
        self::assertSame($this->repositoriesUrl, $this->sut->getRepositoriesUrl());
    }

    public function testGetHtmlUrl(): void
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testGetCreatedAt(): void
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testGetUpdatedAt(): void
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testHasRepositorySelection(): void
    {
        self::assertTrue($this->sut->hasRepositorySelection());
    }

    public function testSerialize(): void
    {
        $expected = [
            'installationId'      => 25235,
            'installationAccount' => [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                'siteAdmin' => false,
            ],
            'applicationId'       => 177,
            'repositorySelection' => 'selected',
            'permissions'         => ['0' => 'some-installation-permission', '1' => 'another-installation-permission'],
            'events'              => ['0' => 'some-installation-event', '1' => 'another-installation-event'],
            'accessTokenUrl'      => 'access-token-url',
            'repositoriesUrl'     => 'installationRepositoriesUrl',
            'htmlUrl'             => 'installationHtmlUrl',
            'createdAt'           => '2016-08-02T17:35:14+00:00',
            'updatedAt'           => '2016-08-03T11:31:05+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubInstallation::deserialize(json_decode($serialized, true)));
    }
}
