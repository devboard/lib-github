<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\IssueComment;

use DevboardLib\GitHub\IssueComment\IssueCommentId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\IssueComment\IssueCommentId
 * @group  unit
 */
class IssueCommentIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var IssueCommentId */
    private $sut;

    public function setUp(): void
    {
        $this->id  = 1;
        $this->sut = new IssueCommentId($this->id);
    }

    public function testGetId(): void
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testToString(): void
    {
        self::assertSame((string) $this->id, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->id));
    }
}
