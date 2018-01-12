<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use PhpSpec\ObjectBehavior;

class UserAvatarUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($avatarUrl = 'https://avatars3.githubusercontent.com/u/583231?v=4');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserAvatarUrl::class);
        $this->shouldHaveType(AccountAvatarUrl::class);
    }

    public function it_exposes_avatar_url()
    {
        $this->getAvatarUrl()->shouldReturn('https://avatars3.githubusercontent.com/u/583231?v=4');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('https://avatars3.githubusercontent.com/u/583231?v=4');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://avatars3.githubusercontent.com/u/583231?v=4');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('https://avatars3.githubusercontent.com/u/583231?v=4');
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://avatars3.githubusercontent.com/u/583231?v=4';

        $this->deserialize($input)->shouldReturnAnInstanceOf(UserAvatarUrl::class);
    }
}
