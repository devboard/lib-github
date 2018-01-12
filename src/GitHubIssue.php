<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Issue\IssueApiUrl;
use DevboardLib\GitHub\Issue\IssueAssignee;
use DevboardLib\GitHub\Issue\IssueAssigneeCollection;
use DevboardLib\GitHub\Issue\IssueAuthor;
use DevboardLib\GitHub\Issue\IssueBody;
use DevboardLib\GitHub\Issue\IssueClosedAt;
use DevboardLib\GitHub\Issue\IssueCreatedAt;
use DevboardLib\GitHub\Issue\IssueHtmlUrl;
use DevboardLib\GitHub\Issue\IssueId;
use DevboardLib\GitHub\Issue\IssueNumber;
use DevboardLib\GitHub\Issue\IssueState;
use DevboardLib\GitHub\Issue\IssueTitle;
use DevboardLib\GitHub\Issue\IssueUpdatedAt;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 *
 * @see \spec\DevboardLib\GitHub\GitHubIssueSpec
 * @see \Tests\DevboardLib\GitHub\GitHubIssueTest
 */
class GitHubIssue
{
    /** @var IssueId */
    private $id;

    /** @var IssueNumber */
    private $number;

    /** @var IssueTitle */
    private $title;

    /** @var IssueBody */
    private $body;

    /** @var IssueState */
    private $state;

    /** @var IssueAuthor */
    private $author;

    /** @var IssueApiUrl */
    private $apiUrl;

    /** @var IssueHtmlUrl */
    private $htmlUrl;

    /** @var IssueAssignee|null */
    private $assignee;

    /** @var IssueAssigneeCollection */
    private $assignees;

    /** @var GitHubLabelCollection */
    private $labels;

    /** @var GitHubMilestone|null */
    private $milestone;

    /** @var IssueClosedAt|null */
    private $closedAt;

    /** @var IssueCreatedAt */
    private $createdAt;

    /** @var IssueUpdatedAt */
    private $updatedAt;

    public function __construct(
        IssueId $id,
        IssueNumber $number,
        IssueTitle $title,
        IssueBody $body,
        IssueState $state,
        IssueAuthor $author,
        IssueApiUrl $apiUrl,
        IssueHtmlUrl $htmlUrl,
        ?IssueAssignee $assignee,
        IssueAssigneeCollection $assignees,
        GitHubLabelCollection $labels,
        ?GitHubMilestone $milestone,
        ?IssueClosedAt $closedAt,
        IssueCreatedAt $createdAt,
        IssueUpdatedAt $updatedAt
    ) {
        $this->id        = $id;
        $this->number    = $number;
        $this->title     = $title;
        $this->body      = $body;
        $this->state     = $state;
        $this->author    = $author;
        $this->apiUrl    = $apiUrl;
        $this->htmlUrl   = $htmlUrl;
        $this->assignee  = $assignee;
        $this->assignees = $assignees;
        $this->labels    = $labels;
        $this->milestone = $milestone;
        $this->closedAt  = $closedAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): IssueId
    {
        return $this->id;
    }

    public function getNumber(): IssueNumber
    {
        return $this->number;
    }

    public function getTitle(): IssueTitle
    {
        return $this->title;
    }

    public function getBody(): IssueBody
    {
        return $this->body;
    }

    public function getState(): IssueState
    {
        return $this->state;
    }

    public function getAuthor(): IssueAuthor
    {
        return $this->author;
    }

    public function getApiUrl(): IssueApiUrl
    {
        return $this->apiUrl;
    }

    public function getHtmlUrl(): IssueHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getAssignee(): ?IssueAssignee
    {
        return $this->assignee;
    }

    public function getAssignees(): IssueAssigneeCollection
    {
        return $this->assignees;
    }

    public function getLabels(): GitHubLabelCollection
    {
        return $this->labels;
    }

    public function getMilestone(): ?GitHubMilestone
    {
        return $this->milestone;
    }

    public function getClosedAt(): ?IssueClosedAt
    {
        return $this->closedAt;
    }

    public function getCreatedAt(): IssueCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): IssueUpdatedAt
    {
        return $this->updatedAt;
    }

    public function hasAssignee(): bool
    {
        if (null === $this->assignee) {
            return false;
        }

        return true;
    }

    public function hasMilestone(): bool
    {
        if (null === $this->milestone) {
            return false;
        }

        return true;
    }

    public function hasClosedAt(): bool
    {
        if (null === $this->closedAt) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->assignee) {
            $assignee = null;
        } else {
            $assignee = $this->assignee->serialize();
        }

        if (null === $this->milestone) {
            $milestone = null;
        } else {
            $milestone = $this->milestone->serialize();
        }

        if (null === $this->closedAt) {
            $closedAt = null;
        } else {
            $closedAt = $this->closedAt->serialize();
        }

        return [
            'id'        => $this->id->serialize(),
            'number'    => $this->number->serialize(),
            'title'     => $this->title->serialize(),
            'body'      => $this->body->serialize(),
            'state'     => $this->state->serialize(),
            'author'    => $this->author->serialize(),
            'apiUrl'    => $this->apiUrl->serialize(),
            'htmlUrl'   => $this->htmlUrl->serialize(),
            'assignee'  => $assignee,
            'assignees' => $this->assignees->serialize(),
            'labels'    => $this->labels->serialize(),
            'milestone' => $milestone,
            'closedAt'  => $closedAt,
            'createdAt' => $this->createdAt->serialize(),
            'updatedAt' => $this->updatedAt->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['assignee']) {
            $assignee = null;
        } else {
            $assignee = IssueAssignee::deserialize($data['assignee']);
        }

        if (null === $data['milestone']) {
            $milestone = null;
        } else {
            $milestone = GitHubMilestone::deserialize($data['milestone']);
        }

        if (null === $data['closedAt']) {
            $closedAt = null;
        } else {
            $closedAt = IssueClosedAt::deserialize($data['closedAt']);
        }

        return new self(
            IssueId::deserialize($data['id']),
            IssueNumber::deserialize($data['number']),
            IssueTitle::deserialize($data['title']),
            IssueBody::deserialize($data['body']),
            IssueState::deserialize($data['state']),
            IssueAuthor::deserialize($data['author']),
            IssueApiUrl::deserialize($data['apiUrl']),
            IssueHtmlUrl::deserialize($data['htmlUrl']),
            $assignee,
            IssueAssigneeCollection::deserialize($data['assignees']),
            GitHubLabelCollection::deserialize($data['labels']),
            $milestone,
            $closedAt,
            IssueCreatedAt::deserialize($data['createdAt']),
            IssueUpdatedAt::deserialize($data['updatedAt'])
        );
    }
}
