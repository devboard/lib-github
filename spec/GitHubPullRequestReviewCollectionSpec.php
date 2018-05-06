<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubPullRequestReview;
use DevboardLib\GitHub\GitHubPullRequestReviewCollection;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewId;
use PhpSpec\ObjectBehavior;

class GitHubPullRequestReviewCollectionSpec extends ObjectBehavior
{
    public function let(GitHubPullRequestReview $gitHubPullRequestReview)
    {
        $this->beConstructedWith($elements = [$gitHubPullRequestReview]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubPullRequestReviewCollection::class);
    }

    public function it_exposes_elements(GitHubPullRequestReview $gitHubPullRequestReview)
    {
        $this->toArray()->shouldReturn([$gitHubPullRequestReview]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(GitHubPullRequestReview $anotherGitHubPullRequestReview)
    {
        $this->add($anotherGitHubPullRequestReview);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(
        GitHubPullRequestReview $gitHubPullRequestReview, PullRequestReviewId $pullRequestReviewId
    ) {
        $gitHubPullRequestReview->getId()->shouldBeCalled()->willReturn($pullRequestReviewId);
        $this->has($pullRequestReviewId)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(
        GitHubPullRequestReview $gitHubPullRequestReview, PullRequestReviewId $pullRequestReviewId
    ) {
        $gitHubPullRequestReview->getId()->shouldBeCalled()->willReturn($pullRequestReviewId);
        $this->get($pullRequestReviewId)->shouldReturn($gitHubPullRequestReview);
    }
}
