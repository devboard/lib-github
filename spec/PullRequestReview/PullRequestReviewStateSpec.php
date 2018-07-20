<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewState;
use PhpSpec\ObjectBehavior;

class PullRequestReviewStateSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($value = 'approved');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestReviewState::class);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('approved');
    }

    public function it_is_castable_to_string()
    {
        $this->asString()->shouldReturn('approved');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('approved');
    }

    public function it_can_be_deserialized()
    {
        $input = 'approved';

        $this->deserialize($input)->shouldReturnAnInstanceOf(PullRequestReviewState::class);
    }
}
