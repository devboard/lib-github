<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\GitHub\Repo\RepoFullName;
use Git\Reference;

/**
 * @see \spec\DevboardLib\GitHub\GitHubBranchSpec
 * @see \Tests\DevboardLib\GitHub\GitHubBranchTest
 */
class GitHubBranch implements Reference
{
    /** @var RepoFullName */
    private $repoFullName;

    /** @var BranchName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var bool|null */
    private $protected;

    /** @var BranchProtectionUrl|null */
    private $protectionUrl;

    public function __construct(
        RepoFullName $repoFullName,
        BranchName $name,
        GitHubCommit $commit,
        ?bool $protected = null,
        ?BranchProtectionUrl $protectionUrl = null
    ) {
        $this->repoFullName  = $repoFullName;
        $this->name          = $name;
        $this->commit        = $commit;
        $this->protected     = $protected;
        $this->protectionUrl = $protectionUrl;
    }

    public function getRepoFullName(): RepoFullName
    {
        return $this->repoFullName;
    }

    public function getName(): BranchName
    {
        return $this->name;
    }

    /**
     * @deprecated Please use getName
     */
    public function getBranchName(): BranchName
    {
        return $this->name;
    }

    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }

    public function isProtected(): ?bool
    {
        return $this->protected;
    }

    public function getProtectionUrl(): ?BranchProtectionUrl
    {
        return $this->protectionUrl;
    }

    public function hasProtected(): bool
    {
        if (null === $this->protected) {
            return false;
        }

        return true;
    }

    public function hasProtectionUrl(): bool
    {
        if (null === $this->protectionUrl) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->protectionUrl) {
            $protectionUrl = null;
        } else {
            $protectionUrl = $this->protectionUrl->serialize();
        }

        return [
            'repoFullName'  => $this->repoFullName->serialize(),
            'name'          => $this->name->serialize(),
            'commit'        => $this->commit->serialize(),
            'protected'     => $this->protected,
            'protectionUrl' => $protectionUrl,
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['protectionUrl']) {
            $protectionUrl = null;
        } else {
            $protectionUrl = BranchProtectionUrl::deserialize($data['protectionUrl']);
        }

        return new self(
            RepoFullName::deserialize($data['repoFullName']),
            BranchName::deserialize($data['name']),
            GitHubCommit::deserialize($data['commit']),
            $data['protected'],
            $protectionUrl
        );
    }
}
