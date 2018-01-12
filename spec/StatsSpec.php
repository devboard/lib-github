<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Stats;
use PhpSpec\ObjectBehavior;

abstract class StatsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(123);
    }

    public function it_extends()
    {
        $this->shouldHaveType(Stats::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn(123);
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('123');
    }
}
