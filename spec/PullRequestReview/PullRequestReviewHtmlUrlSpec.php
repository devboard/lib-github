<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewHtmlUrl;
use PhpSpec\ObjectBehavior;

class PullRequestReviewHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($htmlUrl = 'htmlUrl');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestReviewHtmlUrl::class);
    }

    public function it_exposes_html_url()
    {
        $this->getHtmlUrl()->shouldReturn('htmlUrl');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('htmlUrl');
    }

    public function it_is_castable_to_string()
    {
        $this->asString()->shouldReturn('htmlUrl');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('htmlUrl');
    }

    public function it_can_be_deserialized()
    {
        $input = 'htmlUrl';

        $this->deserialize($input)->shouldReturnAnInstanceOf(PullRequestReviewHtmlUrl::class);
    }
}
