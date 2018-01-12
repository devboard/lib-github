<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Issue\IssueNumber;
use PhpSpec\ObjectBehavior;

class IssueNumberSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($value = 1);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(IssueNumber::class);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(1);
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('1');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(1);
    }

    public function it_can_be_deserialized()
    {
        $input = 1;

        $this->deserialize($input)->shouldReturnAnInstanceOf(IssueNumber::class);
    }
}
