<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Milestone;

use DevboardLib\GitHub\Milestone\MilestoneState;
use PhpSpec\ObjectBehavior;

class MilestoneStateSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('open');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MilestoneState::class);
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

        $this->deserialize($input)->shouldReturnAnInstanceOf(MilestoneState::class);
    }
}
