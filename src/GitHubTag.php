<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\Repo\RepoFullName;
use Git\Reference;

/**
 * @see \spec\DevboardLib\GitHub\GitHubTagSpec
 * @see \Tests\DevboardLib\GitHub\GitHubTagTest
 */
class GitHubTag implements Reference
{
    /** @var RepoFullName */
    private $repoFullName;

    /** @var TagName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    public function __construct(RepoFullName $repoFullName, TagName $name, GitHubCommit $commit)
    {
        $this->repoFullName = $repoFullName;
        $this->name         = $name;
        $this->commit       = $commit;
    }

    public function getRepoFullName(): RepoFullName
    {
        return $this->repoFullName;
    }

    public function getName(): TagName
    {
        return $this->name;
    }

    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }

    public function serialize(): array
    {
        return [
            'repoFullName' => $this->repoFullName->serialize(),
            'name'         => $this->name->serialize(),
            'commit'       => $this->commit->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            RepoFullName::deserialize($data['repoFullName']),
            TagName::deserialize($data['name']),
            GitHubCommit::deserialize($data['commit'])
        );
    }
}
