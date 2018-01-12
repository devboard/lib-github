<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use PhpSpec\ObjectBehavior;

class BranchProtectionUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($protectionUrl = 'protectionUrl');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BranchProtectionUrl::class);
    }

    public function it_exposes_protection_url()
    {
        $this->getProtectionUrl()->shouldReturn('protectionUrl');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('protectionUrl');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('protectionUrl');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('protectionUrl');
    }

    public function it_can_be_deserialized()
    {
        $input = 'protectionUrl';

        $this->deserialize($input)->shouldReturnAnInstanceOf(BranchProtectionUrl::class);
    }
}
