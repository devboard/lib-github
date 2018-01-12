<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;
use PhpSpec\ObjectBehavior;

class RequiredStatusChecksEnforcementLevelSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($enforcementLevel = 'enforcementLevel');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RequiredStatusChecksEnforcementLevel::class);
    }

    public function it_exposes_enforcement_level()
    {
        $this->getEnforcementLevel()->shouldReturn('enforcementLevel');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('enforcementLevel');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('enforcementLevel');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('enforcementLevel');
    }

    public function it_can_be_deserialized()
    {
        $input = 'enforcementLevel';

        $this->deserialize($input)->shouldReturnAnInstanceOf(RequiredStatusChecksEnforcementLevel::class);
    }
}
