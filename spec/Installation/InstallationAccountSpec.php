<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Installation\InstallationAccount;
use PhpSpec\ObjectBehavior;

class InstallationAccountSpec extends ObjectBehavior
{
    public function let(
        AccountId $userId,
        AccountLogin $login,
        AccountType $type,
        AccountAvatarUrl $avatarUrl,
        GravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl
    ) {
        $this->beConstructedWith(
            $userId, $login, $type, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin = false
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationAccount::class);
    }

    public function it_exposes_user_id(AccountId $userId)
    {
        $this->getUserId()->shouldReturn($userId);
    }

    public function it_exposes_login(AccountLogin $login)
    {
        $this->getLogin()->shouldReturn($login);
    }

    public function it_exposes_type(AccountType $type)
    {
        $this->getType()->shouldReturn($type);
    }

    public function it_exposes_avatar_url(AccountAvatarUrl $avatarUrl)
    {
        $this->getAvatarUrl()->shouldReturn($avatarUrl);
    }

    public function it_exposes_gravatar_id(GravatarId $gravatarId)
    {
        $this->getGravatarId()->shouldReturn($gravatarId);
    }

    public function it_exposes_html_url(AccountHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }

    public function it_exposes_api_url(AccountApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_exposes_is_site_admin()
    {
        $this->isSiteAdmin()->shouldReturn(false);
    }

    public function it_can_be_serialized(
        AccountId $userId,
        AccountLogin $login,
        AccountType $type,
        AccountAvatarUrl $avatarUrl,
        GravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl
    ) {
        $userId->serialize()->shouldBeCalled()->willReturn(583231);
        $login->serialize()->shouldBeCalled()->willReturn('octocat');
        $type->serialize()->shouldBeCalled()->willReturn('User');
        $avatarUrl->serialize()->shouldBeCalled()->willReturn('https://avatars3.githubusercontent.com/u/583231?v=4');
        $gravatarId->serialize()->shouldBeCalled()->willReturn('');
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('https://github.com/octocat');
        $apiUrl->serialize()->shouldBeCalled()->willReturn('https://api.github.com/users/octocat');
        $this->serialize()->shouldReturn(
            [
                'userId'     => 583231,
                'login'      => 'octocat',
                'type'       => 'User',
                'avatarUrl'  => 'https://avatars3.githubusercontent.com/u/583231?v=4',
                'gravatarId' => '',
                'htmlUrl'    => 'https://github.com/octocat',
                'apiUrl'     => 'https://api.github.com/users/octocat',
                'siteAdmin'  => false,
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'userId'     => 583231,
            'login'      => 'octocat',
            'type'       => 'User',
            'avatarUrl'  => 'https://avatars3.githubusercontent.com/u/583231?v=4',
            'gravatarId' => '',
            'htmlUrl'    => 'https://github.com/octocat',
            'apiUrl'     => 'https://api.github.com/users/octocat',
            'siteAdmin'  => false,
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationAccount::class);
    }
}
