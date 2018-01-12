<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use PhpSpec\ObjectBehavior;

class RepoSshUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($sshUrl = 'git@github.com:octocat/linguist.git');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoSshUrl::class);
    }

    public function it_exposes_ssh_url()
    {
        $this->getSshUrl()->shouldReturn('git@github.com:octocat/linguist.git');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('git@github.com:octocat/linguist.git');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('git@github.com:octocat/linguist.git');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('git@github.com:octocat/linguist.git');
    }

    public function it_can_be_deserialized()
    {
        $input = 'git@github.com:octocat/linguist.git';

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoSshUrl::class);
    }
}
