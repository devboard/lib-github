<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\GitHubRepo;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestBaseSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestBaseTest
 */
class PullRequestBase
{
    /** @var BranchName */
    private $targetBranchName;

    /** @var GitHubRepo */
    private $repo;

    /** @var CommitSha */
    private $sha;

    public function __construct(BranchName $targetBranchName, GitHubRepo $repo, CommitSha $sha)
    {
        $this->targetBranchName = $targetBranchName;
        $this->repo             = $repo;
        $this->sha              = $sha;
    }

    public function getTargetBranchName(): BranchName
    {
        return $this->targetBranchName;
    }

    public function getRepo(): GitHubRepo
    {
        return $this->repo;
    }

    public function getSha(): CommitSha
    {
        return $this->sha;
    }

    public function serialize(): array
    {
        return [
            'targetBranchName' => $this->targetBranchName->serialize(),
            'repo'             => $this->repo->serialize(),
            'sha'              => $this->sha->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            BranchName::deserialize($data['targetBranchName']),
            GitHubRepo::deserialize($data['repo']),
            CommitSha::deserialize($data['sha'])
        );
    }
}
