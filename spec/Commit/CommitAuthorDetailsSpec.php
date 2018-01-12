<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PhpSpec\ObjectBehavior;

class CommitAuthorDetailsSpec extends ObjectBehavior
{
    public function let(
        UserId $userId,
        UserLogin $login,
        AccountType $type,
        UserAvatarUrl $avatarUrl,
        GravatarId $gravatarId,
        UserHtmlUrl $htmlUrl,
        UserApiUrl $apiUrl
    ) {
        $this->beConstructedWith(
            $userId, $login, $type, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin = false
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitAuthorDetails::class);
    }

    public function it_exposes_user_id(UserId $userId)
    {
        $this->getUserId()->shouldReturn($userId);
    }

    public function it_exposes_login(UserLogin $login)
    {
        $this->getLogin()->shouldReturn($login);
    }

    public function it_exposes_type(AccountType $type)
    {
        $this->getType()->shouldReturn($type);
    }

    public function it_exposes_avatar_url(UserAvatarUrl $avatarUrl)
    {
        $this->getAvatarUrl()->shouldReturn($avatarUrl);
    }

    public function it_exposes_gravatar_id(GravatarId $gravatarId)
    {
        $this->getGravatarId()->shouldReturn($gravatarId);
    }

    public function it_exposes_html_url(UserHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }

    public function it_exposes_api_url(UserApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_exposes_is_site_admin()
    {
        $this->isSiteAdmin()->shouldReturn(false);
    }

    public function it_can_be_serialized(
        UserId $userId,
        UserLogin $login,
        AccountType $type,
        UserAvatarUrl $avatarUrl,
        GravatarId $gravatarId,
        UserHtmlUrl $htmlUrl,
        UserApiUrl $apiUrl
    ) {
        $userId->serialize()->shouldBeCalled()->willReturn(6752317);
        $login->serialize()->shouldBeCalled()->willReturn('baxterthehacker');
        $type->serialize()->shouldBeCalled()->willReturn('User');
        $avatarUrl->serialize()->shouldBeCalled()->willReturn('https://avatars.githubusercontent.com/u/6752317?v=3');
        $gravatarId->serialize()->shouldBeCalled()->willReturn('205e460b479e2e5b48aec07710c08d50');
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('https://github.com/baxterthehacker');
        $apiUrl->serialize()->shouldBeCalled()->willReturn('https://api.github.com/users/baxterthehacker');
        $this->serialize()->shouldReturn(
            [
                'userId'     => 6752317,
                'login'      => 'baxterthehacker',
                'type'       => 'User',
                'avatarUrl'  => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'https://github.com/baxterthehacker',
                'apiUrl'     => 'https://api.github.com/users/baxterthehacker',
                'siteAdmin'  => false,
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'userId'     => 6752317,
            'login'      => 'baxterthehacker',
            'type'       => 'User',
            'avatarUrl'  => 'https://avatars.githubusercontent.com/u/6752317?v=3',
            'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
            'htmlUrl'    => 'https://github.com/baxterthehacker',
            'apiUrl'     => 'https://api.github.com/users/baxterthehacker',
            'siteAdmin'  => false,
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitAuthorDetails::class);
    }
}
