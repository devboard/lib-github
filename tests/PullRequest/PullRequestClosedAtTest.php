<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DateTime;
use DevboardLib\GitHub\PullRequest\PullRequestClosedAt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestClosedAt
 * @group  unit
 */
class PullRequestClosedAtTest extends TestCase
{
    /** @var PullRequestClosedAt */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new PullRequestClosedAt('2018-01-01T11:22:33+00:00');
    }

    public function testCreateFromFormat(): void
    {
        $result = $this->sut::createFromFormat(DateTime::ATOM, '2018-01-01T11:22:33Z');
        self::assertEquals('2018-01-01T11:22:33+00:00', $result->__toString());
    }

    public function testToString(): void
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->__toString());
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
