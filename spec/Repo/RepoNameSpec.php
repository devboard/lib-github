<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoName;
use PhpSpec\ObjectBehavior;

class RepoNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'linguist');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoName::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('linguist');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('linguist');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('linguist');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('linguist');
    }

    public function it_can_be_deserialized()
    {
        $input = 'linguist';

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoName::class);
    }
}
