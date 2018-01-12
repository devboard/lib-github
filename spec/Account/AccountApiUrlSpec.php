<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountApiUrl;
use PhpSpec\ObjectBehavior;

class AccountApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($apiUrl = 'https://api.github.com/users/baxterthehacker');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountApiUrl::class);
    }

    public function it_exposes_api_url()
    {
        $this->getApiUrl()->shouldReturn('https://api.github.com/users/baxterthehacker');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('https://api.github.com/users/baxterthehacker');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://api.github.com/users/baxterthehacker');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('https://api.github.com/users/baxterthehacker');
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://api.github.com/users/baxterthehacker';

        $this->deserialize($input)->shouldReturnAnInstanceOf(AccountApiUrl::class);
    }
}
