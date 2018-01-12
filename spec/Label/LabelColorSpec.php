<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Label;

use DevboardLib\GitHub\Label\LabelColor;
use PhpSpec\ObjectBehavior;

class LabelColorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($color = 'color');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LabelColor::class);
    }

    public function it_exposes_color()
    {
        $this->getColor()->shouldReturn('color');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('color');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('color');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('color');
    }

    public function it_can_be_deserialized()
    {
        $input = 'color';

        $this->deserialize($input)->shouldReturnAnInstanceOf(LabelColor::class);
    }
}
