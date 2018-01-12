<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Issue\IssueApiUrl;
use DevboardLib\GitHub\Issue\IssueId;
use DevboardLib\GitHub\IssueComment\IssueCommentApiUrl;
use DevboardLib\GitHub\IssueComment\IssueCommentAuthor;
use DevboardLib\GitHub\IssueComment\IssueCommentBody;
use DevboardLib\GitHub\IssueComment\IssueCommentCreatedAt;
use DevboardLib\GitHub\IssueComment\IssueCommentHtmlUrl;
use DevboardLib\GitHub\IssueComment\IssueCommentId;
use DevboardLib\GitHub\IssueComment\IssueCommentUpdatedAt;

/**
 * @see \spec\DevboardLib\GitHub\GitHubIssueCommentSpec
 * @see \Tests\DevboardLib\GitHub\GitHubIssueCommentTest
 */
class GitHubIssueComment
{
    /** @var IssueCommentId */
    private $id;

    /** @var IssueId */
    private $issueId;

    /** @var IssueCommentBody */
    private $body;

    /** @var IssueCommentAuthor */
    private $author;

    /** @var IssueCommentHtmlUrl */
    private $htmlUrl;

    /** @var IssueCommentApiUrl */
    private $apiUrl;

    /** @var IssueApiUrl */
    private $issueApiUrl;

    /** @var IssueCommentCreatedAt */
    private $createdAt;

    /** @var IssueCommentUpdatedAt */
    private $updatedAt;

    public function __construct(
        IssueCommentId $id,
        IssueId $issueId,
        IssueCommentBody $body,
        IssueCommentAuthor $author,
        IssueCommentHtmlUrl $htmlUrl,
        IssueCommentApiUrl $apiUrl,
        IssueApiUrl $issueApiUrl,
        IssueCommentCreatedAt $createdAt,
        IssueCommentUpdatedAt $updatedAt
    ) {
        $this->id          = $id;
        $this->issueId     = $issueId;
        $this->body        = $body;
        $this->author      = $author;
        $this->htmlUrl     = $htmlUrl;
        $this->apiUrl      = $apiUrl;
        $this->issueApiUrl = $issueApiUrl;
        $this->createdAt   = $createdAt;
        $this->updatedAt   = $updatedAt;
    }

    public function getId(): IssueCommentId
    {
        return $this->id;
    }

    public function getIssueId(): IssueId
    {
        return $this->issueId;
    }

    public function getBody(): IssueCommentBody
    {
        return $this->body;
    }

    public function getAuthor(): IssueCommentAuthor
    {
        return $this->author;
    }

    public function getHtmlUrl(): IssueCommentHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): IssueCommentApiUrl
    {
        return $this->apiUrl;
    }

    public function getIssueApiUrl(): IssueApiUrl
    {
        return $this->issueApiUrl;
    }

    public function getCreatedAt(): IssueCommentCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): IssueCommentUpdatedAt
    {
        return $this->updatedAt;
    }

    public function serialize(): array
    {
        return [
            'id'          => $this->id->serialize(),
            'issueId'     => $this->issueId->serialize(),
            'body'        => $this->body->serialize(),
            'author'      => $this->author->serialize(),
            'htmlUrl'     => $this->htmlUrl->serialize(),
            'apiUrl'      => $this->apiUrl->serialize(),
            'issueApiUrl' => $this->issueApiUrl->serialize(),
            'createdAt'   => $this->createdAt->serialize(),
            'updatedAt'   => $this->updatedAt->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            IssueCommentId::deserialize($data['id']),
            IssueId::deserialize($data['issueId']),
            IssueCommentBody::deserialize($data['body']),
            IssueCommentAuthor::deserialize($data['author']),
            IssueCommentHtmlUrl::deserialize($data['htmlUrl']),
            IssueCommentApiUrl::deserialize($data['apiUrl']),
            IssueApiUrl::deserialize($data['issueApiUrl']),
            IssueCommentCreatedAt::deserialize($data['createdAt']),
            IssueCommentUpdatedAt::deserialize($data['updatedAt'])
        );
    }
}
