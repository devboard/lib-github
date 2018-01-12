<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoLanguage;
use PhpSpec\ObjectBehavior;

class RepoLanguageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($language = 'CSS');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoLanguage::class);
    }

    public function it_exposes_language()
    {
        $this->getLanguage()->shouldReturn('CSS');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('CSS');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('CSS');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('CSS');
    }

    public function it_can_be_deserialized()
    {
        $input = 'CSS';

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoLanguage::class);
    }
}
