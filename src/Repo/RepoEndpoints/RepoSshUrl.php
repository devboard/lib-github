<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo\RepoEndpoints;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrlSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrlTest
 */
class RepoSshUrl
{
    /** @var string */
    private $sshUrl;

    public function __construct(string $sshUrl)
    {
        $this->sshUrl = $sshUrl;
    }

    public function getSshUrl(): string
    {
        return $this->sshUrl;
    }

    public function getValue(): string
    {
        return $this->sshUrl;
    }

    public function __toString(): string
    {
        return $this->sshUrl;
    }

    public function serialize(): string
    {
        return $this->sshUrl;
    }

    public static function deserialize(string $sshUrl): self
    {
        return new self($sshUrl);
    }
}
