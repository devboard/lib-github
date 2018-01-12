<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Application;

use DevboardLib\GitHub\Application\ApplicationId;
use PhpSpec\ObjectBehavior;

class ApplicationIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 177);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ApplicationId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(177);
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('177');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(177);
    }

    public function it_can_be_deserialized()
    {
        $input = 177;

        $this->deserialize($input)->shouldReturnAnInstanceOf(ApplicationId::class);
    }
}
