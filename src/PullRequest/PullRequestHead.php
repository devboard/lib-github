<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\GitHubRepo;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestHeadSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestHeadTest
 */
class PullRequestHead
{
    /** @var BranchName */
    private $targetBranchName;

    /** @var GitHubRepo|null */
    private $repo;

    /** @var CommitSha */
    private $sha;

    public function __construct(BranchName $targetBranchName, ?GitHubRepo $repo, CommitSha $sha)
    {
        $this->targetBranchName = $targetBranchName;
        $this->repo             = $repo;
        $this->sha              = $sha;
    }

    public function getTargetBranchName(): BranchName
    {
        return $this->targetBranchName;
    }

    public function getRepo(): ?GitHubRepo
    {
        return $this->repo;
    }

    public function getSha(): CommitSha
    {
        return $this->sha;
    }

    public function hasRepo(): bool
    {
        if (null === $this->repo) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->repo) {
            $repo = null;
        } else {
            $repo = $this->repo->serialize();
        }

        return [
            'targetBranchName' => $this->targetBranchName->serialize(),
            'repo'             => $repo,
            'sha'              => $this->sha->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['repo']) {
            $repo = null;
        } else {
            $repo = GitHubRepo::deserialize($data['repo']);
        }

        return new self(
            BranchName::deserialize($data['targetBranchName']), $repo, CommitSha::deserialize($data['sha'])
        );
    }
}
