<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountId;
use PhpSpec\ObjectBehavior;

class AccountIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 6752317);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(6752317);
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('6752317');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(6752317);
    }

    public function it_can_be_deserialized()
    {
        $input = 6752317;

        $this->deserialize($input)->shouldReturnAnInstanceOf(AccountId::class);
    }
}
