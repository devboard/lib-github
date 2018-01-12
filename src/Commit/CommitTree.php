<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use Git\Commit\CommitTree as CommitTreeInterface;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitTreeSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitTreeTest
 */
class CommitTree implements CommitTreeInterface
{
    /** @var CommitSha */
    private $sha;

    /** @var TreeApiUrl */
    private $apiUrl;

    public function __construct(CommitSha $sha, TreeApiUrl $apiUrl)
    {
        $this->sha    = $sha;
        $this->apiUrl = $apiUrl;
    }

    public function getSha(): CommitSha
    {
        return $this->sha;
    }

    public function getApiUrl(): TreeApiUrl
    {
        return $this->apiUrl;
    }

    public function serialize(): array
    {
        return [
            'sha'    => $this->sha->serialize(),
            'apiUrl' => $this->apiUrl->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(CommitSha::deserialize($data['sha']), TreeApiUrl::deserialize($data['apiUrl']));
    }
}
