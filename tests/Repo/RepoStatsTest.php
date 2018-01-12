<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoStats
 * @group  unit
 */
class RepoStatsTest extends TestCase
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

    /** @var RepoStats */
    private $sut;

    public function setUp()
    {
        $this->networkCount     = 11;
        $this->watchersCount    = 12;
        $this->stargazersCount  = 13;
        $this->subscribersCount = 14;
        $this->openIssuesCount  = 15;
        $this->size             = new RepoSize(16);
        $this->sut              = new RepoStats(
            $this->networkCount,
            $this->watchersCount,
            $this->stargazersCount,
            $this->subscribersCount,
            $this->openIssuesCount,
            $this->size
        );
    }

    public function testGetNetworkCount()
    {
        self::assertSame($this->networkCount, $this->sut->getNetworkCount());
    }

    public function testGetWatchersCount()
    {
        self::assertSame($this->watchersCount, $this->sut->getWatchersCount());
    }

    public function testGetStargazersCount()
    {
        self::assertSame($this->stargazersCount, $this->sut->getStargazersCount());
    }

    public function testGetSubscribersCount()
    {
        self::assertSame($this->subscribersCount, $this->sut->getSubscribersCount());
    }

    public function testGetOpenIssuesCount()
    {
        self::assertSame($this->openIssuesCount, $this->sut->getOpenIssuesCount());
    }

    public function testGetSize()
    {
        self::assertSame($this->size, $this->sut->getSize());
    }

    public function testSerialize()
    {
        $expected = [
            'networkCount'     => 11,
            'watchersCount'    => 12,
            'stargazersCount'  => 13,
            'subscribersCount' => 14,
            'openIssuesCount'  => 15,
            'size'             => 16,
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoStats::deserialize(json_decode($serialized, true)));
    }
}
