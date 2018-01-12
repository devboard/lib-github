<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use PhpSpec\ObjectBehavior;

class VerificationPayloadSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($payload = 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VerificationPayload::class);
    }

    public function it_exposes_payload()
    {
        $this->getPayload()->shouldReturn('tree 691272480426f78a0138979dd3ce63b77f706feb\n...');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('tree 691272480426f78a0138979dd3ce63b77f706feb\n...');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('tree 691272480426f78a0138979dd3ce63b77f706feb\n...');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('tree 691272480426f78a0138979dd3ce63b77f706feb\n...');
    }

    public function it_can_be_deserialized()
    {
        $input = 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...';

        $this->deserialize($input)->shouldReturnAnInstanceOf(VerificationPayload::class);
    }
}
