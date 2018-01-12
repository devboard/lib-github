<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use PhpSpec\ObjectBehavior;

class UserHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($htmlUrl = 'https://github.com/octocat');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserHtmlUrl::class);
        $this->shouldHaveType(AccountHtmlUrl::class);
    }

    public function it_exposes_html_url()
    {
        $this->getHtmlUrl()->shouldReturn('https://github.com/octocat');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('https://github.com/octocat');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://github.com/octocat');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('https://github.com/octocat');
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://github.com/octocat';

        $this->deserialize($input)->shouldReturnAnInstanceOf(UserHtmlUrl::class);
    }
}
