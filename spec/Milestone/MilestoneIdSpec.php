<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Milestone;

use DevboardLib\GitHub\Milestone\MilestoneId;
use PhpSpec\ObjectBehavior;

class MilestoneIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 1);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MilestoneId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(1);
    }

    public function it_is_castable_to_string()
    {
        $this->asString()->shouldReturn('1');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(1);
    }

    public function it_can_be_deserialized()
    {
        $input = 1;

        $this->deserialize($input)->shouldReturnAnInstanceOf(MilestoneId::class);
    }
}
