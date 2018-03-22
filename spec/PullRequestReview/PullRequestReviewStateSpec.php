<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewState;
use PhpSpec\ObjectBehavior;

class PullRequestReviewStateSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($value = 'open');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestReviewState::class);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('open');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('open');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('open');
    }

    public function it_can_be_deserialized()
    {
        $input = 'open';

        $this->deserialize($input)->shouldReturnAnInstanceOf(PullRequestReviewState::class);
    }
}
