<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\GitHubPullRequestReview;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthor;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewBody;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewId;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewState;
use DevboardLib\GitHub\PullRequestReview\PullRequestReviewSubmittedAt;
use PhpSpec\ObjectBehavior;

class GitHubPullRequestReviewSpec extends ObjectBehavior
{
    public function let(
        PullRequestReviewId $id,
        PullRequestReviewBody $body,
        PullRequestReviewAuthor $author,
        PullRequestReviewState $state,
        CommitSha $commitSha,
        PullRequestReviewSubmittedAt $submittedAt
    ) {
        $this->beConstructedWith($id, $body, $author, $state, $commitSha, $submittedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubPullRequestReview::class);
    }

    public function it_exposes_id(PullRequestReviewId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_body(PullRequestReviewBody $body)
    {
        $this->getBody()->shouldReturn($body);
    }

    public function it_exposes_author(PullRequestReviewAuthor $author)
    {
        $this->getAuthor()->shouldReturn($author);
    }

    public function it_exposes_state(PullRequestReviewState $state)
    {
        $this->getState()->shouldReturn($state);
    }

    public function it_exposes_commit_sha(CommitSha $commitSha)
    {
        $this->getCommitSha()->shouldReturn($commitSha);
    }

    public function it_exposes_submitted_at(PullRequestReviewSubmittedAt $submittedAt)
    {
        $this->getSubmittedAt()->shouldReturn($submittedAt);
    }

    public function it_has_submitted_at()
    {
        $this->hasSubmittedAt()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        PullRequestReviewId $id,
        PullRequestReviewBody $body,
        PullRequestReviewAuthor $author,
        PullRequestReviewState $state,
        CommitSha $commitSha,
        PullRequestReviewSubmittedAt $submittedAt
    ) {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $body->serialize()->shouldBeCalled()->willReturn('value');
        $author->serialize()->shouldBeCalled()->willReturn(
            [
                'userId'      => 1,
                'login'       => 'value',
                'type'        => 'User',
                'association' => 'NONE',
                'avatarUrl'   => 'avatarUrl',
                'gravatarId'  => 'id',
                'htmlUrl'     => 'htmlUrl',
                'apiUrl'      => 'apiUrl',
                'siteAdmin'   => true,
            ]
        );
        $state->serialize()->shouldBeCalled()->willReturn('commented');
        $commitSha->serialize()->shouldBeCalled()->willReturn('sha');
        $submittedAt->serialize()->shouldBeCalled()->willReturn('2016-09-04T13:23:11+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'     => 1,
                'body'   => 'value',
                'author' => [
                    'userId'      => 1,
                    'login'       => 'value',
                    'type'        => 'User',
                    'association' => 'NONE',
                    'avatarUrl'   => 'avatarUrl',
                    'gravatarId'  => 'id',
                    'htmlUrl'     => 'htmlUrl',
                    'apiUrl'      => 'apiUrl',
                    'siteAdmin'   => true,
                ],
                'state'       => 'commented',
                'commitSha'   => 'sha',
                'submittedAt' => '2016-09-04T13:23:11+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'     => 1,
            'body'   => 'value',
            'author' => [
                'userId'      => 1,
                'login'       => 'value',
                'type'        => 'User',
                'association' => 'NONE',
                'avatarUrl'   => 'avatarUrl',
                'gravatarId'  => 'id',
                'htmlUrl'     => 'htmlUrl',
                'apiUrl'      => 'apiUrl',
                'siteAdmin'   => true,
            ],
            'state'       => 'commented',
            'commitSha'   => 'sha',
            'submittedAt' => '2016-09-04T13:23:11+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubPullRequestReview::class);
    }
}
