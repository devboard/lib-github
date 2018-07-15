<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\IssueComment;

use DateTime;
use DevboardLib\GitHub\IssueComment\IssueCommentCreatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\IssueComment\IssueCommentCreatedAt
 * @group  unit
 */
class IssueCommentCreatedAtTest extends TestCase
{
    /** @var IssueCommentCreatedAt */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new IssueCommentCreatedAt('2018-01-01T11:22:33+00:00');
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
