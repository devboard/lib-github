<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoPushedAt;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoTimestamps
 * @group  unit
 */
class RepoTimestampsTest extends TestCase
{
    /** @var RepoCreatedAt */
    private $createdAt;

    /** @var RepoUpdatedAt */
    private $updatedAt;

    /** @var RepoPushedAt */
    private $pushedAt;

    /** @var RepoTimestamps */
    private $sut;

    public function setUp(): void
    {
        $this->createdAt = new RepoCreatedAt('2011-01-26T19:01:12+00:00');
        $this->updatedAt = new RepoUpdatedAt('2017-11-16T09:16:48+00:00');
        $this->pushedAt  = new RepoPushedAt('2017-11-04T22:17:54+00:00');
        $this->sut       = new RepoTimestamps($this->createdAt, $this->updatedAt, $this->pushedAt);
    }

    public function testGetCreatedAt(): void
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testGetUpdatedAt(): void
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testGetPushedAt(): void
    {
        self::assertSame($this->pushedAt, $this->sut->getPushedAt());
    }

    public function testSerialize(): void
    {
        $expected = [
            'createdAt' => '2011-01-26T19:01:12+00:00',
            'updatedAt' => '2017-11-16T09:16:48+00:00',
            'pushedAt'  => '2017-11-04T22:17:54+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoTimestamps::deserialize(json_decode($serialized, true)));
    }
}
