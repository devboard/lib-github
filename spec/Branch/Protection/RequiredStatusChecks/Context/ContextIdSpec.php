<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use PhpSpec\ObjectBehavior;

class ContextIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 1);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ContextId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(1);
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

        $this->deserialize($input)->shouldReturnAnInstanceOf(ContextId::class);
    }
}
