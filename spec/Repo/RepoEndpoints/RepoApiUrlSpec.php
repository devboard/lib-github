<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use PhpSpec\ObjectBehavior;

class RepoApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($apiUrl = 'https://api.github.com/repos/octocat/linguist');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoApiUrl::class);
    }

    public function it_exposes_api_url()
    {
        $this->getApiUrl()->shouldReturn('https://api.github.com/repos/octocat/linguist');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('https://api.github.com/repos/octocat/linguist');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://api.github.com/repos/octocat/linguist');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('https://api.github.com/repos/octocat/linguist');
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://api.github.com/repos/octocat/linguist';

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoApiUrl::class);
    }
}
