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

    public function setUp()
    {
        $this->commentsUrl = 'commentsUrl';
        $this->sut         = new CommitCommentsUrl($this->commentsUrl);
    }

    public function testGetCommentsUrl()
    {
        self::assertSame($this->commentsUrl, $this->sut->getCommentsUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->commentsUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->commentsUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->commentsUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->commentsUrl));
    }
}
