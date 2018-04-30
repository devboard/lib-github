<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

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
use DevboardLib\GitHub\Installation\InstallationUpdatedAt;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubInstallationSpec extends ObjectBehavior
{
    public function let(
        InstallationId $installationId,
        InstallationAccount $installationAccount,
        ApplicationId $applicationId,
        InstallationRepositorySelection $repositorySelection,
        InstallationPermissions $permissions,
        InstallationEvents $events,
        InstallationAccessTokenUrl $accessTokenUrl,
        InstallationRepositoriesUrl $repositoriesUrl,
        InstallationHtmlUrl $htmlUrl,
        InstallationCreatedAt $createdAt,
        InstallationUpdatedAt $updatedAt
    ) {
        $this->beConstructedWith(
            $installationId,
            $installationAccount,
            $applicationId,
            $repositorySelection,
            $permissions,
            $events,
            $accessTokenUrl,
            $repositoriesUrl,
            $htmlUrl,
            $createdAt,
            $updatedAt
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubInstallation::class);
    }

    public function it_exposes_installation_id(InstallationId $installationId)
    {
        $this->getInstallationId()->shouldReturn($installationId);
    }

    public function it_exposes_installation_account(InstallationAccount $installationAccount)
    {
        $this->getInstallationAccount()->shouldReturn($installationAccount);
    }

    public function it_exposes_application_id(ApplicationId $applicationId)
    {
        $this->getApplicationId()->shouldReturn($applicationId);
    }

    public function it_exposes_repository_selection(InstallationRepositorySelection $repositorySelection)
    {
        $this->getRepositorySelection()->shouldReturn($repositorySelection);
    }

    public function it_exposes_permissions(InstallationPermissions $permissions)
    {
        $this->getPermissions()->shouldReturn($permissions);
    }

    public function it_exposes_events(InstallationEvents $events)
    {
        $this->getEvents()->shouldReturn($events);
    }

    public function it_exposes_access_token_url(InstallationAccessTokenUrl $accessTokenUrl)
    {
        $this->getAccessTokenUrl()->shouldReturn($accessTokenUrl);
    }

    public function it_exposes_repositories_url(InstallationRepositoriesUrl $repositoriesUrl)
    {
        $this->getRepositoriesUrl()->shouldReturn($repositoriesUrl);
    }

    public function it_exposes_html_url(InstallationHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }

    public function it_exposes_created_at(InstallationCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_exposes_updated_at(InstallationUpdatedAt $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_has_repository_selection()
    {
        $this->hasRepositorySelection()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        InstallationId $installationId,
        InstallationAccount $installationAccount,
        ApplicationId $applicationId,
        InstallationRepositorySelection $repositorySelection,
        InstallationPermissions $permissions,
        InstallationEvents $events,
        InstallationAccessTokenUrl $accessTokenUrl,
        InstallationRepositoriesUrl $repositoriesUrl,
        InstallationHtmlUrl $htmlUrl,
        InstallationCreatedAt $createdAt,
        InstallationUpdatedAt $updatedAt
    ) {
        $installationId->serialize()->shouldBeCalled()->willReturn(25235);
        $installationAccount->serialize()->shouldBeCalled()->willReturn(
            [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'siteAdmin' => false,
            ]
        );
        $applicationId->serialize()->shouldBeCalled()->willReturn(177);
        $repositorySelection->serialize()->shouldBeCalled()->willReturn('selected');
        $permissions->serialize()->shouldBeCalled()->willReturn(
            ['0' => 'some-installation-permission', '1' => 'another-installation-permission']
        );
        $events->serialize()->shouldBeCalled()->willReturn(
            ['0' => 'some-installation-event', '1' => 'another-installation-event']
        );
        $accessTokenUrl->serialize()->shouldBeCalled()->willReturn('access-token-url');
        $repositoriesUrl->serialize()->shouldBeCalled()->willReturn('installationRepositoriesUrl');
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('installationHtmlUrl');
        $createdAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $updatedAt->serialize()->shouldBeCalled()->willReturn('2016-08-03T11:31:05+00:00');
        $this->serialize()->shouldReturn(
            [
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
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
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

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubInstallation::class);
    }
}
