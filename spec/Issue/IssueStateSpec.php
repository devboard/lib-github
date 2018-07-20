<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Issue\IssueState;
use PhpSpec\ObjectBehavior;

class IssueStateSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('open');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(IssueState::class);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('open');
    }

    public function it_is_castable_to_string()
    {
        $this->asString()->shouldReturn('open');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('open');
    }

    public function it_can_be_deserialized()
    {
        $input = 'open';

        $this->deserialize($input)->shouldReturnAnInstanceOf(IssueState::class);
    }
}
