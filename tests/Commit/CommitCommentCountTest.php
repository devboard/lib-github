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

    public function setUp()
    {
        $this->commentCount = 73;
        $this->sut          = new CommitCommentCount($this->commentCount);
    }

    public function testGetCommentCount()
    {
        self::assertSame($this->commentCount, $this->sut->getCommentCount());
    }

    public function testGetValue()
    {
        self::assertSame($this->commentCount, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame((string) $this->commentCount, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->commentCount, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->commentCount));
    }
}
