<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitHtmlUrl
 * @group  unit
 */
class CommitHtmlUrlTest extends TestCase
{
    /** @var string */
    private $htmlUrl;

    /** @var CommitHtmlUrl */
    private $sut;

    public function setUp()
    {
        $this->htmlUrl = 'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47';
        $this->sut     = new CommitHtmlUrl($this->htmlUrl);
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
