<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DateTime;
use DevboardLib\GitHub\PullRequest\PullRequestCreatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestCreatedAt
 * @group  unit
 */
class PullRequestCreatedAtTest extends TestCase
{
    /** @var PullRequestCreatedAt */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new PullRequestCreatedAt('2018-01-01T11:22:33+00:00');
    }

    public function testCreateFromFormat(): void
    {
        $result = $this->sut::createFromFormat(DateTime::ATOM, '2018-01-01T11:22:33Z');
        self::assertEquals('2018-01-01T11:22:33+00:00', $result->asString());
    }

    public function testToString(): void
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize('2018-01-01T11:22:33+00:00'));
    }
}
