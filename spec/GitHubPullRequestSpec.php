<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubLabelCollection;
use DevboardLib\GitHub\GitHubMilestone;
use DevboardLib\GitHub\GitHubPullRequest;
use DevboardLib\GitHub\PullRequest\PullRequestAssignee;
use DevboardLib\GitHub\PullRequest\PullRequestAssigneeCollection;
use DevboardLib\GitHub\PullRequest\PullRequestAuthor;
use DevboardLib\GitHub\PullRequest\PullRequestBody;
use DevboardLib\GitHub\PullRequest\PullRequestClosedAt;
use DevboardLib\GitHub\PullRequest\PullRequestCreatedAt;
use DevboardLib\GitHub\PullRequest\PullRequestId;
use DevboardLib\GitHub\PullRequest\PullRequestNumber;
use DevboardLib\GitHub\PullRequest\PullRequestState;
use DevboardLib\GitHub\PullRequest\PullRequestTitle;
use DevboardLib\GitHub\PullRequest\PullRequestUpdatedAt;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubPullRequestSpec extends ObjectBehavior
{
    public function let(
        PullRequestId $id,
        PullRequestNumber $number,
        PullRequestTitle $title,
        PullRequestBody $body,
        PullRequestState $state,
        PullRequestAuthor $author,
        PullRequestAssignee $assignee,
        PullRequestAssigneeCollection $assignees,
        GitHubLabelCollection $labels,
        GitHubMilestone $milestone,
        PullRequestClosedAt $closedAt,
        PullRequestCreatedAt $createdAt,
        PullRequestUpdatedAt $updatedAt
    ) {
        $this->beConstructedWith(
            $id,
            $number,
            $title,
            $body,
            $state,
            $author,
            $assignee,
            $assignees,
            $labels,
            $milestone,
            $closedAt,
            $createdAt,
            $updatedAt
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubPullRequest::class);
    }

    public function it_exposes_id(PullRequestId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_number(PullRequestNumber $number)
    {
        $this->getNumber()->shouldReturn($number);
    }

    public function it_exposes_title(PullRequestTitle $title)
    {
        $this->getTitle()->shouldReturn($title);
    }

    public function it_exposes_body(PullRequestBody $body)
    {
        $this->getBody()->shouldReturn($body);
    }

    public function it_exposes_state(PullRequestState $state)
    {
        $this->getState()->shouldReturn($state);
    }

    public function it_exposes_author(PullRequestAuthor $author)
    {
        $this->getAuthor()->shouldReturn($author);
    }

    public function it_exposes_assignee(PullRequestAssignee $assignee)
    {
        $this->getAssignee()->shouldReturn($assignee);
    }

    public function it_exposes_assignees(PullRequestAssigneeCollection $assignees)
    {
        $this->getAssignees()->shouldReturn($assignees);
    }

    public function it_exposes_labels(GitHubLabelCollection $labels)
    {
        $this->getLabels()->shouldReturn($labels);
    }

    public function it_exposes_milestone(GitHubMilestone $milestone)
    {
        $this->getMilestone()->shouldReturn($milestone);
    }

    public function it_exposes_closed_at(PullRequestClosedAt $closedAt)
    {
        $this->getClosedAt()->shouldReturn($closedAt);
    }

    public function it_exposes_created_at(PullRequestCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_exposes_updated_at(PullRequestUpdatedAt $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_has_assignee()
    {
        $this->hasAssignee()->shouldReturn(true);
    }

    public function it_has_milestone()
    {
        $this->hasMilestone()->shouldReturn(true);
    }

    public function it_has_closed_at()
    {
        $this->hasClosedAt()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        PullRequestId $id,
        PullRequestNumber $number,
        PullRequestTitle $title,
        PullRequestBody $body,
        PullRequestState $state,
        PullRequestAuthor $author,
        PullRequestAssignee $assignee,
        PullRequestAssigneeCollection $assignees,
        GitHubLabelCollection $labels,
        GitHubMilestone $milestone,
        PullRequestClosedAt $closedAt,
        PullRequestCreatedAt $createdAt,
        PullRequestUpdatedAt $updatedAt
    ) {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $number->serialize()->shouldBeCalled()->willReturn(1);
        $title->serialize()->shouldBeCalled()->willReturn('value');
        $body->serialize()->shouldBeCalled()->willReturn('value');
        $state->serialize()->shouldBeCalled()->willReturn('closed');
        $author->serialize()->shouldBeCalled()->willReturn(
            [
                'userId'      => 6752317,
                'login'       => 'devboard-test',
                'type'        => 'Bot',
                'association' => 'NONE',
                'avatarUrl'   => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'siteAdmin'   => false,
            ]
        );
        $assignee->serialize()->shouldBeCalled()->willReturn(
            [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'siteAdmin' => false,
            ]
        );
        $assignees->serialize()->shouldBeCalled()->willReturn(
            [
                [
                    'userId'    => 6752317,
                    'login'     => 'devboard-test',
                    'type'      => 'Bot',
                    'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                    'siteAdmin' => false,
                ],
            ]
        );
        $labels->serialize()->shouldBeCalled()->willReturn(
            [['id' => 1, 'name' => 'value', 'color' => 'color', 'default' => true, 'apiUrl' => 'apiUrl']]
        );
        $milestone->serialize()->shouldBeCalled()->willReturn(
            [
                'id'          => 1,
                'title'       => 'value',
                'description' => 'value',
                'dueOn'       => '2016-08-02T17:35:14+00:00',
                'state'       => 'closed',
                'number'      => 1,
                'creator'     => [
                    'userId'    => 6752317,
                    'login'     => 'devboard-test',
                    'type'      => 'Bot',
                    'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                    'siteAdmin' => false,
                ],
                'htmlUrl'   => 'htmlUrl',
                'apiUrl'    => 'apiUrl',
                'closedAt'  => '2016-08-02T17:35:14+00:00',
                'createdAt' => '2016-08-02T17:35:14+00:00',
                'updatedAt' => '2016-08-02T17:35:14+00:00',
            ]
        );
        $closedAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $createdAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $updatedAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'     => 1,
                'number' => 1,
                'title'  => 'value',
                'body'   => 'value',
                'state'  => 'closed',
                'author' => [
                    'userId'      => 6752317,
                    'login'       => 'devboard-test',
                    'type'        => 'Bot',
                    'association' => 'NONE',
                    'avatarUrl'   => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                    'siteAdmin'   => false,
                ],
                'assignee' => [
                    'userId'    => 6752317,
                    'login'     => 'devboard-test',
                    'type'      => 'Bot',
                    'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                    'siteAdmin' => false,
                ],
                'assignees' => [
                    [
                        'userId'    => 6752317,
                        'login'     => 'devboard-test',
                        'type'      => 'Bot',
                        'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                        'siteAdmin' => false,
                    ],
                ],
                'labels' => [
                    ['id' => 1, 'name' => 'value', 'color' => 'color', 'default' => true, 'apiUrl' => 'apiUrl'],
                ],
                'milestone' => [
                    'id'          => 1,
                    'title'       => 'value',
                    'description' => 'value',
                    'dueOn'       => '2016-08-02T17:35:14+00:00',
                    'state'       => 'closed',
                    'number'      => 1,
                    'creator'     => [
                        'userId'    => 6752317,
                        'login'     => 'devboard-test',
                        'type'      => 'Bot',
                        'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                        'siteAdmin' => false,
                    ],
                    'htmlUrl'   => 'htmlUrl',
                    'apiUrl'    => 'apiUrl',
                    'closedAt'  => '2016-08-02T17:35:14+00:00',
                    'createdAt' => '2016-08-02T17:35:14+00:00',
                    'updatedAt' => '2016-08-02T17:35:14+00:00',
                ],
                'closedAt'  => '2016-08-02T17:35:14+00:00',
                'createdAt' => '2016-08-02T17:35:14+00:00',
                'updatedAt' => '2016-08-02T17:35:14+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'     => 1,
            'number' => 1,
            'title'  => 'value',
            'body'   => 'value',
            'state'  => 'closed',
            'author' => [
                'userId'      => 6752317,
                'login'       => 'devboard-test',
                'type'        => 'Bot',
                'association' => 'NONE',
                'avatarUrl'   => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'siteAdmin'   => false,
            ],
            'assignee' => [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'siteAdmin' => false,
            ],
            'assignees' => [
                [
                    'userId'    => 6752317,
                    'login'     => 'devboard-test',
                    'type'      => 'Bot',
                    'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                    'siteAdmin' => false,
                ],
            ],
            'labels'    => [['id' => 1, 'name' => 'value', 'color' => 'color', 'default' => true, 'apiUrl' => 'apiUrl']],
            'milestone' => [
                'id'          => 1,
                'title'       => 'value',
                'description' => 'value',
                'dueOn'       => '2016-08-02T17:35:14+00:00',
                'state'       => 'closed',
                'number'      => 1,
                'creator'     => [
                    'userId'    => 6752317,
                    'login'     => 'devboard-test',
                    'type'      => 'Bot',
                    'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                    'siteAdmin' => false,
                ],
                'htmlUrl'   => 'htmlUrl',
                'apiUrl'    => 'apiUrl',
                'closedAt'  => '2016-08-02T17:35:14+00:00',
                'createdAt' => '2016-08-02T17:35:14+00:00',
                'updatedAt' => '2016-08-02T17:35:14+00:00',
            ],
            'closedAt'  => '2016-08-02T17:35:14+00:00',
            'createdAt' => '2016-08-02T17:35:14+00:00',
            'updatedAt' => '2016-08-02T17:35:14+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubPullRequest::class);
    }
}
