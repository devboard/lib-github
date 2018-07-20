<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoFullNameSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoFullNameTest
 */
class RepoFullName
{
    /** @var AccountLogin */
    private $owner;

    /** @var RepoName */
    private $repoName;

    public function __construct(AccountLogin $owner, RepoName $repoName)
    {
        $this->owner    = $owner;
        $this->repoName = $repoName;
    }

    public static function createFromString(string $fullName): self
    {
        list($owner, $name) = explode('/', $fullName);

        return new self(new AccountLogin($owner), new RepoName($name));
    }

    public function getValue(): string
    {
        return $this->owner->getValue().'/'.$this->repoName->getValue();
    }

    public function asString(): string
    {
        return $this->getValue();
    }

    /**
     * @deprecated Please use `asString()`
     */
    public function __toString(): string
    {
        return $this->getValue();
    }

    public function getOwner(): AccountLogin
    {
        return $this->owner;
    }

    public function getRepoName(): RepoName
    {
        return $this->repoName;
    }

    public function serialize(): array
    {
        return ['owner' => $this->owner->serialize(), 'repoName' => $this->repoName->serialize()];
    }

    public static function deserialize(array $data): self
    {
        return new self(AccountLogin::deserialize($data['owner']), RepoName::deserialize($data['repoName']));
    }
}
