<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use PhpSpec\ObjectBehavior;

class VerificationVerifiedSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($verified = true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VerificationVerified::class);
    }

    public function it_exposes_is_verified()
    {
        $this->isVerified()->shouldReturn(true);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(true);
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('true');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(true);
    }

    public function it_can_be_deserialized()
    {
        $input = true;

        $this->deserialize($input)->shouldReturnAnInstanceOf(VerificationVerified::class);
    }
}
