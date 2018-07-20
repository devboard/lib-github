<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitCommentsUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitCommentsUrl
 * @group  unit
 */
class CommitCommentsUrlTest extends TestCase
{
    /** @var string */
    private $commentsUrl;

    /** @var CommitCommentsUrl */
    private $sut;

    public function setUp(): void
    {
        $this->commentsUrl = 'commentsUrl';
        $this->sut         = new CommitCommentsUrl($this->commentsUrl);
    }

    public function testGetCommentsUrl(): void
    {
        self::assertSame($this->commentsUrl, $this->sut->getCommentsUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->commentsUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->commentsUrl, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->commentsUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->commentsUrl));
    }
}
