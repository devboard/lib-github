<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthor;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociation;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class PullRequestReviewAuthorSpec extends ObjectBehavior
{
    public function let(
        AccountId $userId,
        AccountLogin $login,
        AccountType $type,
        PullRequestReviewAuthorAssociation $association,
        AccountAvatarUrl $avatarUrl,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl
    ) {
        $this->beConstructedWith(
            $userId, $login, $type, $association, $avatarUrl, $htmlUrl, $apiUrl, $siteAdmin = false
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestReviewAuthor::class);
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

    public function it_exposes_association(PullRequestReviewAuthorAssociation $association)
    {
        $this->getAssociation()->shouldReturn($association);
    }

    public function it_exposes_avatar_url(AccountAvatarUrl $avatarUrl)
    {
        $this->getAvatarUrl()->shouldReturn($avatarUrl);
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

    public function it_has_association()
    {
        $this->hasAssociation()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        AccountId $userId,
        AccountLogin $login,
        AccountType $type,
        PullRequestReviewAuthorAssociation $association,
        AccountAvatarUrl $avatarUrl,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl
    ) {
        $userId->serialize()->shouldBeCalled()->willReturn(583231);
        $login->serialize()->shouldBeCalled()->willReturn('octocat');
        $type->serialize()->shouldBeCalled()->willReturn('User');
        $association->serialize()->shouldBeCalled()->willReturn('NONE');
        $avatarUrl->serialize()->shouldBeCalled()->willReturn('https://avatars3.githubusercontent.com/u/583231?v=4');

        $htmlUrl->serialize()->shouldBeCalled()->willReturn('https://github.com/octocat');
        $apiUrl->serialize()->shouldBeCalled()->willReturn('https://api.github.com/users/octocat');
        $this->serialize()->shouldReturn(
            [
                'userId'      => 583231,
                'login'       => 'octocat',
                'type'        => 'User',
                'association' => 'NONE',
                'avatarUrl'   => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                'htmlUrl'   => 'https://github.com/octocat',
                'apiUrl'    => 'https://api.github.com/users/octocat',
                'siteAdmin' => false,
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'userId'      => 583231,
            'login'       => 'octocat',
            'type'        => 'User',
            'association' => 'NONE',
            'avatarUrl'   => 'https://avatars3.githubusercontent.com/u/583231?v=4',

            'htmlUrl'   => 'https://github.com/octocat',
            'apiUrl'    => 'https://api.github.com/users/octocat',
            'siteAdmin' => false,
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(PullRequestReviewAuthor::class);
    }
}
