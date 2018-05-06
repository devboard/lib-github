<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use Git\Commit\CommitTree as CommitTreeInterface;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitTreeSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitTreeTest
 */
class CommitTree implements CommitTreeInterface
{
    /** @var CommitSha */
    private $sha;

    public function __construct(CommitSha $sha)
    {
        $this->sha = $sha;
    }

    public function getSha(): CommitSha
    {
        return $this->sha;
    }

    public function serialize(): array
    {
        return ['sha' => $this->sha->serialize()];
    }

    public static function deserialize(array $data): self
    {
        return new self(CommitSha::deserialize($data['sha']));
    }
}
