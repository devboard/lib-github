<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo\RepoEndpoints;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrlSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrlTest
 */
class RepoApiUrl
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

    public function asString(): string
    {
        return $this->apiUrl;
    }

    /**
     * @deprecated Please use `asString()`
     */
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
