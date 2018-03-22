<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequestReview;

/**
 * @see \spec\DevboardLib\GitHub\PullRequestReview\PullRequestReviewHtmlUrlSpec
 * @see \Tests\DevboardLib\GitHub\PullRequestReview\PullRequestReviewHtmlUrlTest
 */
class PullRequestReviewHtmlUrl
{
    /** @var string */
    private $apiUrl;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function getValue(): string
    {
        return $this->apiUrl;
    }

    public function __toString(): string
    {
        return $this->apiUrl;
    }

    public function serialize(): string
    {
        return $this->apiUrl;
    }

    public static function deserialize(string $apiUrl): self
    {
        return new self($apiUrl);
    }
}
