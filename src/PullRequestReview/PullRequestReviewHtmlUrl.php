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
    private $htmlUrl;

    public function __construct(string $htmlUrl)
    {
        $this->htmlUrl = $htmlUrl;
    }

    public function getHtmlUrl(): string
    {
        return $this->htmlUrl;
    }

    public function getValue(): string
    {
        return $this->htmlUrl;
    }

    public function asString(): string
    {
        return $this->htmlUrl;
    }

    /**
     * @deprecated Please use `asString()`
     */
    public function __toString(): string
    {
        return $this->htmlUrl;
    }

    public function serialize(): string
    {
        return $this->htmlUrl;
    }

    public static function deserialize(string $htmlUrl): self
    {
        return new self($htmlUrl);
    }
}
