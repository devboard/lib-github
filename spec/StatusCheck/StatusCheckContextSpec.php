<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\StatusCheck;

use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use PhpSpec\ObjectBehavior;

class StatusCheckContextSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($description = 'ci/circleci');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(StatusCheckContext::class);
    }

    public function it_exposes_description()
    {
        $this->getDescription()->shouldReturn('ci/circleci');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('ci/circleci');
    }

    public function it_is_castable_to_string()
    {
        $this->asString()->shouldReturn('ci/circleci');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('ci/circleci');
    }

    public function it_can_be_deserialized()
    {
        $input = 'ci/circleci';

        $this->deserialize($input)->shouldReturnAnInstanceOf(StatusCheckContext::class);
    }
}
