<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\IssueComment;

use DevboardLib\GitHub\IssueComment\IssueCommentHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\IssueComment\IssueCommentHtmlUrl
 * @group  todo
 */
class IssueCommentHtmlUrlTest extends TestCase
{
    /** @var string */
    private $htmlUrl;

    /** @var IssueCommentHtmlUrl */
    private $sut;

    public function setUp()
    {
        $this->htmlUrl = 'htmlUrl';
        $this->sut     = new IssueCommentHtmlUrl($this->htmlUrl);
    }

    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->htmlUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->htmlUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->htmlUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->htmlUrl));
    }
}
