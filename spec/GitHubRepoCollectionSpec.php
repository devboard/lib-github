<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\GitHubRepoCollection;
use DevboardLib\GitHub\Repo\RepoFullName;
use PhpSpec\ObjectBehavior;

class GitHubRepoCollectionSpec extends ObjectBehavior
{
    public function let(GitHubRepo $gitHubRepo)
    {
        $this->beConstructedWith($elements = [$gitHubRepo]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoCollection::class);
    }

    public function it_exposes_elements(GitHubRepo $gitHubRepo)
    {
        $this->toArray()->shouldReturn([$gitHubRepo]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(GitHubRepo $anotherGitHubRepo)
    {
        $this->add($anotherGitHubRepo);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(GitHubRepo $gitHubRepo, RepoFullName $repoFullName)
    {
        $gitHubRepo->getFullName()->shouldBeCalled()->willReturn($repoFullName);
        $this->has($repoFullName)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(
        GitHubRepo $gitHubRepo, RepoFullName $repoFullName
    ) {
        $gitHubRepo->getFullName()->shouldBeCalled()->willReturn($repoFullName);
        $this->get($repoFullName)->shouldReturn($gitHubRepo);
    }
}
