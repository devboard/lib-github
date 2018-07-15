<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl
 * @group  unit
 */
class RepoHtmlUrlTest extends TestCase
{
    /** @var string */
    private $htmlUrl;

    /** @var RepoHtmlUrl */
    private $sut;

    public function setUp(): void
    {
        $this->htmlUrl = 'https://github.com/octocat/linguist';
        $this->sut     = new RepoHtmlUrl($this->htmlUrl);
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
        self::assertEquals($this->sut, $this->sut->deserialize($this->htmlUrl));
    }
}
