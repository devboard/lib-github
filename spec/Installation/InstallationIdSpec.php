<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationId;
use PhpSpec\ObjectBehavior;

class InstallationIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 25235);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(25235);
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('25235');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(25235);
    }

    public function it_can_be_deserialized()
    {
        $input = 25235;

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationId::class);
    }
}
