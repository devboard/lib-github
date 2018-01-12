<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Issue;

/**
 * @see \spec\DevboardLib\GitHub\Issue\IssueApiUrlSpec
 * @see \Tests\DevboardLib\GitHub\Issue\IssueApiUrlTest
 */
class IssueApiUrl
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
