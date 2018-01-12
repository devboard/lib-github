<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoTimestampsSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoTimestampsTest
 */
class RepoTimestamps
{
    /** @var RepoCreatedAt */
    private $createdAt;

    /** @var RepoUpdatedAt */
    private $updatedAt;

    /** @var RepoPushedAt */
    private $pushedAt;

    public function __construct(RepoCreatedAt $createdAt, RepoUpdatedAt $updatedAt, RepoPushedAt $pushedAt)
    {
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->pushedAt  = $pushedAt;
    }

    public function getCreatedAt(): RepoCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): RepoUpdatedAt
    {
        return $this->updatedAt;
    }

    public function getPushedAt(): RepoPushedAt
    {
        return $this->pushedAt;
    }

    public function serialize(): array
    {
        return [
            'createdAt' => $this->createdAt->serialize(),
            'updatedAt' => $this->updatedAt->serialize(),
            'pushedAt'  => $this->pushedAt->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            RepoCreatedAt::deserialize($data['createdAt']),
            RepoUpdatedAt::deserialize($data['updatedAt']),
            RepoPushedAt::deserialize($data['pushedAt'])
        );
    }
}
