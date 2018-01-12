<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubBranchCollection;
use PhpSpec\ObjectBehavior;

class GitHubBranchCollectionSpec extends ObjectBehavior
{
    public function let(GitHubBranch $gitHubBranch)
    {
        $this->beConstructedWith($elements = [$gitHubBranch]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranchCollection::class);
    }

    public function it_exposes_elements(GitHubBranch $gitHubBranch)
    {
        $this->toArray()->shouldReturn([$gitHubBranch]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(GitHubBranch $anotherGitHubBranch)
    {
        $this->add($anotherGitHubBranch);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(GitHubBranch $gitHubBranch, BranchName $branchName)
    {
        $gitHubBranch->getName()->shouldBeCalled()->willReturn($branchName);
        $this->has($branchName)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(
        GitHubBranch $gitHubBranch, BranchName $branchName
    ) {
        $gitHubBranch->getName()->shouldBeCalled()->willReturn($branchName);
        $this->get($branchName)->shouldReturn($gitHubBranch);
    }
}
