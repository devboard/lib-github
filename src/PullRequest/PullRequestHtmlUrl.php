<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestHtmlUrlSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestHtmlUrlTest
 */
class PullRequestHtmlUrl
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
