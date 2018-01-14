<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequest;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\PullRequest\PullRequestReviewer;
use PhpSpec\ObjectBehavior;

class PullRequestReviewerSpec extends ObjectBehavior
{
    public function let(
        AccountId $userId,
        AccountLogin $login,
        AccountType $gitHubAccountType,
        AccountAvatarUrl $avatarUrl,
        GravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl
    ) {
        $this->beConstructedWith(
            $userId, $login, $gitHubAccountType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, false
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestReviewer::class);
    }

    public function it_should_expose_all_values_via_getters(
        AccountId $userId,
        AccountLogin $login,
        AccountType $gitHubAccountType,
        AccountAvatarUrl $avatarUrl,
        GravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl
    ) {
        $this->getUserId()->shouldReturn($userId);
        $this->getLogin()->shouldReturn($login);
        $this->getAccountType()->shouldReturn($gitHubAccountType);
        $this->getAvatarUrl()->shouldReturn($avatarUrl);
        $this->getGravatarId()->shouldReturn($gravatarId);
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
        $this->getApiUrl()->shouldReturn($apiUrl);
        $this->isSiteAdmin()->shouldReturn(false);
    }
}
