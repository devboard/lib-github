<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\PullRequest\PullRequestState;
use PhpSpec\ObjectBehavior;

class PullRequestStateSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Open');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestState::class);
    }
}
