<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationAccessTokenUrl;
use PhpSpec\ObjectBehavior;

class InstallationAccessTokenUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($accessTokenUrl = 'access-token-url');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationAccessTokenUrl::class);
    }

    public function it_exposes_access_token_url()
    {
        $this->getAccessTokenUrl()->shouldReturn('access-token-url');
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn('access-token-url');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('access-token-url');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('access-token-url');
    }

    public function it_can_be_deserialized()
    {
        $input = 'access-token-url';

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationAccessTokenUrl::class);
    }
}
