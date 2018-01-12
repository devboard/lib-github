<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\User\UserId;
use PhpSpec\ObjectBehavior;

class UserIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 583231);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserId::class);
        $this->shouldHaveType(AccountId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(583231);
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('583231');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(583231);
    }

    public function it_can_be_deserialized()
    {
        $input = 583231;

        $this->deserialize($input)->shouldReturnAnInstanceOf(UserId::class);
    }
}
