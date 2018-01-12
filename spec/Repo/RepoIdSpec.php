<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoId;
use PhpSpec\ObjectBehavior;

class RepoIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 64778136);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(64778136);
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('64778136');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(64778136);
    }

    public function it_can_be_deserialized()
    {
        $input = 64778136;

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoId::class);
    }
}
