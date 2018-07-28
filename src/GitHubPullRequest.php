<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\PullRequest\PullRequestAuthor;
use DevboardLib\GitHub\PullRequest\PullRequestBody;
use DevboardLib\GitHub\PullRequest\PullRequestClosedAt;
use DevboardLib\GitHub\PullRequest\PullRequestCreatedAt;
use DevboardLib\GitHub\PullRequest\PullRequestId;
use DevboardLib\GitHub\PullRequest\PullRequestNumber;
use DevboardLib\GitHub\PullRequest\PullRequestState;
use DevboardLib\GitHub\PullRequest\PullRequestTitle;
use DevboardLib\GitHub\PullRequest\PullRequestUpdatedAt;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 *
 * @see \spec\DevboardLib\GitHub\GitHubPullRequestSpec
 * @see \Tests\DevboardLib\GitHub\GitHubPullRequestTest
 * @deprecated Please stop using this 'entity' like ValueObject
 */
class GitHubPullRequest
{
    /** @var PullRequestId */
    private $id;

    /** @var PullRequestNumber */
    private $number;

    /** @var PullRequestTitle */
    private $title;

    /** @var PullRequestBody */
    private $body;

    /** @var PullRequestState */
    private $state;

    /** @var PullRequestAuthor */
    private $author;

    /** @var PullRequestClosedAt|null */
    private $closedAt;

    /** @var PullRequestCreatedAt */
    private $createdAt;

    /** @var PullRequestUpdatedAt */
    private $updatedAt;

    public function __construct(
        PullRequestId $id,
        PullRequestNumber $number,
        PullRequestTitle $title,
        PullRequestBody $body,
        PullRequestState $state,
        PullRequestAuthor $author,
        ?PullRequestClosedAt $closedAt,
        PullRequestCreatedAt $createdAt,
        PullRequestUpdatedAt $updatedAt
    ) {
        $this->id        = $id;
        $this->number    = $number;
        $this->title     = $title;
        $this->body      = $body;
        $this->state     = $state;
        $this->author    = $author;
        $this->closedAt  = $closedAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): PullRequestId
    {
        return $this->id;
    }

    public function getNumber(): PullRequestNumber
    {
        return $this->number;
    }

    public function getTitle(): PullRequestTitle
    {
        return $this->title;
    }

    public function getBody(): PullRequestBody
    {
        return $this->body;
    }

    public function getState(): PullRequestState
    {
        return $this->state;
    }

    public function getAuthor(): PullRequestAuthor
    {
        return $this->author;
    }

    public function getClosedAt(): ?PullRequestClosedAt
    {
        return $this->closedAt;
    }

    public function getCreatedAt(): PullRequestCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): PullRequestUpdatedAt
    {
        return $this->updatedAt;
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
            'closedAt'  => $closedAt,
            'createdAt' => $this->createdAt->serialize(),
            'updatedAt' => $this->updatedAt->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['closedAt']) {
            $closedAt = null;
        } else {
            $closedAt = PullRequestClosedAt::deserialize($data['closedAt']);
        }

        return new self(
            PullRequestId::deserialize($data['id']),
            PullRequestNumber::deserialize($data['number']),
            PullRequestTitle::deserialize($data['title']),
            PullRequestBody::deserialize($data['body']),
            PullRequestState::deserialize($data['state']),
            PullRequestAuthor::deserialize($data['author']),
            $closedAt,
            PullRequestCreatedAt::deserialize($data['createdAt']),
            PullRequestUpdatedAt::deserialize($data['updatedAt'])
        );
    }
}
