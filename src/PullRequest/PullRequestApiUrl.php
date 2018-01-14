<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestApiUrlSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestApiUrlTest
 */
class PullRequestApiUrl
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
