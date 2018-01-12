<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use PhpSpec\ObjectBehavior;

class RepoMirrorUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($mirrorUrl = 'http://mirror.example.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoMirrorUrl::class);
    }

    public function it_exposes_mirror_url()
    {
        $this->getMirrorUrl()->shouldReturn('http://mirror.example.com');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('http://mirror.example.com');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('http://mirror.example.com');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('http://mirror.example.com');
    }

    public function it_can_be_deserialized()
    {
        $input = 'http://mirror.example.com';

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoMirrorUrl::class);
    }
}
