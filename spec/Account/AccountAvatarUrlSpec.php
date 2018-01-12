<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use PhpSpec\ObjectBehavior;

class AccountAvatarUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($avatarUrl = 'https://avatars.githubusercontent.com/u/6752317?v=3');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountAvatarUrl::class);
    }

    public function it_exposes_avatar_url()
    {
        $this->getAvatarUrl()->shouldReturn('https://avatars.githubusercontent.com/u/6752317?v=3');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('https://avatars.githubusercontent.com/u/6752317?v=3');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://avatars.githubusercontent.com/u/6752317?v=3');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('https://avatars.githubusercontent.com/u/6752317?v=3');
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://avatars.githubusercontent.com/u/6752317?v=3';

        $this->deserialize($input)->shouldReturnAnInstanceOf(AccountAvatarUrl::class);
    }
}
