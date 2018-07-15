<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitCommentCount;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitCommentCount
 * @group  unit
 */
class CommitCommentCountTest extends TestCase
{
    /** @var int */
    private $commentCount;

    /** @var CommitCommentCount */
    private $sut;

    public function setUp(): void
    {
        $this->commentCount = 73;
        $this->sut          = new CommitCommentCount($this->commentCount);
    }

    public function testGetCommentCount(): void
    {
        self::assertSame($this->commentCount, $this->sut->getCommentCount());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->commentCount, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame((string) $this->commentCount, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->commentCount, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->commentCount));
    }
}
