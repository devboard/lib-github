<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoName;
use PhpSpec\ObjectBehavior;

class RepoFullNameSpec extends ObjectBehavior
{
    public function let(AccountLogin $owner, RepoName $repoName)
    {
        $this->beConstructedWith($owner, $repoName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoFullName::class);
    }

    public function it_exposes_owner(AccountLogin $owner)
    {
        $this->getOwner()->shouldReturn($owner);
    }

    public function it_exposes_repo_name(RepoName $repoName)
    {
        $this->getRepoName()->shouldReturn($repoName);
    }

    public function it_can_be_serialized(AccountLogin $owner, RepoName $repoName)
    {
        $owner->serialize()->shouldBeCalled()->willReturn('octocat');
        $repoName->serialize()->shouldBeCalled()->willReturn('linguist');
        $this->serialize()->shouldReturn(['owner' => 'octocat', 'repoName' => 'linguist']);
    }

    public function it_can_be_deserialized()
    {
        $input = ['owner' => 'octocat', 'repoName' => 'linguist'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoFullName::class);
    }
}
