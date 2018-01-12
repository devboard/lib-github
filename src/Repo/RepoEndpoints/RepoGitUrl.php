<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo\RepoEndpoints;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrlSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrlTest
 */
class RepoGitUrl
{
    /** @var string */
    private $gitUrl;

    public function __construct(string $gitUrl)
    {
        $this->gitUrl = $gitUrl;
    }

    public function getGitUrl(): string
    {
        return $this->gitUrl;
    }

    public function getValue(): string
    {
        return $this->gitUrl;
    }

    public function __toString(): string
    {
        return $this->gitUrl;
    }

    public function serialize(): string
    {
        return $this->gitUrl;
    }

    public static function deserialize(string $gitUrl): self
    {
        return new self($gitUrl);
    }
}
