<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\User\UserApiUrl;
use PhpSpec\ObjectBehavior;

class UserApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($apiUrl = 'https://api.github.com/users/octocat');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserApiUrl::class);
        $this->shouldHaveType(AccountApiUrl::class);
    }

    public function it_exposes_api_url()
    {
        $this->getApiUrl()->shouldReturn('https://api.github.com/users/octocat');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('https://api.github.com/users/octocat');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://api.github.com/users/octocat');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('https://api.github.com/users/octocat');
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://api.github.com/users/octocat';

        $this->deserialize($input)->shouldReturnAnInstanceOf(UserApiUrl::class);
    }
}
