<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitCommentsUrl;
use PhpSpec\ObjectBehavior;

class CommitCommentsUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($commentsUrl = 'commentsUrl');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitCommentsUrl::class);
    }

    public function it_exposes_comments_url()
    {
        $this->getCommentsUrl()->shouldReturn('commentsUrl');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('commentsUrl');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('commentsUrl');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('commentsUrl');
    }

    public function it_can_be_deserialized()
    {
        $input = 'commentsUrl';

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitCommentsUrl::class);
    }
}
