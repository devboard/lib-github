<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoStats\RepoSize;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoStatsSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoStatsTest
 */
class RepoStats
{
    /** @var int */
    private $networkCount;

    /** @var int */
    private $watchersCount;

    /** @var int */
    private $stargazersCount;

    /** @var int */
    private $subscribersCount;

    /** @var int */
    private $openIssuesCount;

    /** @var RepoSize */
    private $size;

    public function __construct(
        int $networkCount,
        int $watchersCount,
        int $stargazersCount,
        int $subscribersCount,
        int $openIssuesCount,
        RepoSize $size
    ) {
        $this->networkCount     = $networkCount;
        $this->watchersCount    = $watchersCount;
        $this->stargazersCount  = $stargazersCount;
        $this->subscribersCount = $subscribersCount;
        $this->openIssuesCount  = $openIssuesCount;
        $this->size             = $size;
    }

    public function getNetworkCount(): int
    {
        return $this->networkCount;
    }

    public function getWatchersCount(): int
    {
        return $this->watchersCount;
    }

    public function getStargazersCount(): int
    {
        return $this->stargazersCount;
    }

    public function getSubscribersCount(): int
    {
        return $this->subscribersCount;
    }

    public function getOpenIssuesCount(): int
    {
        return $this->openIssuesCount;
    }

    public function getSize(): RepoSize
    {
        return $this->size;
    }

    public function serialize(): array
    {
        return [
            'networkCount'     => $this->networkCount,
            'watchersCount'    => $this->watchersCount,
            'stargazersCount'  => $this->stargazersCount,
            'subscribersCount' => $this->subscribersCount,
            'openIssuesCount'  => $this->openIssuesCount,
            'size'             => $this->size->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            $data['networkCount'],
            $data['watchersCount'],
            $data['stargazersCount'],
            $data['subscribersCount'],
            $data['openIssuesCount'],
            RepoSize::deserialize($data['size'])
        );
    }
}
