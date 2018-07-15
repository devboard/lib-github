<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequestReview\PullRequestReviewHtmlUrl
 * @group  unit
 */
class PullRequestReviewHtmlUrlTest extends TestCase
{
    /** @var string */
    private $htmlUrl;

    /** @var PullRequestReviewHtmlUrl */
    private $sut;

    public function setUp(): void
    {
        $this->htmlUrl = 'htmlUrl';
        $this->sut     = new PullRequestReviewHtmlUrl($this->htmlUrl);
    }

    public function testGetHtmlUrl(): void
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->htmlUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->htmlUrl, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->htmlUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->htmlUrl));
    }
}
