<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use PhpSpec\ObjectBehavior;

class VerificationReasonSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($reason = 'expired_key');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VerificationReason::class);
    }

    public function it_exposes_reason()
    {
        $this->getReason()->shouldReturn('expired_key');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('expired_key');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('expired_key');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('expired_key');
    }

    public function it_can_be_deserialized()
    {
        $input = 'expired_key';

        $this->deserialize($input)->shouldReturnAnInstanceOf(VerificationReason::class);
    }
}
