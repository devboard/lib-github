<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\GitHubCommitCollection;
use PhpSpec\ObjectBehavior;

class GitHubCommitCollectionSpec extends ObjectBehavior
{
    public function let(GitHubCommit $gitHubCommit)
    {
        $this->beConstructedWith($elements = [$gitHubCommit]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitCollection::class);
    }

    public function it_exposes_elements(GitHubCommit $gitHubCommit)
    {
        $this->toArray()->shouldReturn([$gitHubCommit]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(GitHubCommit $anotherGitHubCommit)
    {
        $this->add($anotherGitHubCommit);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(GitHubCommit $gitHubCommit, CommitSha $commitSha)
    {
        $gitHubCommit->getSha()->shouldBeCalled()->willReturn($commitSha);
        $this->has($commitSha)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(GitHubCommit $gitHubCommit, CommitSha $commitSha)
    {
        $gitHubCommit->getSha()->shouldBeCalled()->willReturn($commitSha);
        $this->get($commitSha)->shouldReturn($gitHubCommit);
    }
}
