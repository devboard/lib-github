<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Issue\IssueTitle;
use PhpSpec\ObjectBehavior;

class IssueTitleSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($value = 'value');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(IssueTitle::class);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('value');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('value');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('value');
    }

    public function it_can_be_deserialized()
    {
        $input = 'value';

        $this->deserialize($input)->shouldReturnAnInstanceOf(IssueTitle::class);
    }
}
