<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl
 * @group  unit
 */
class RepoApiUrlTest extends TestCase
{
    /** @var string */
    private $apiUrl;

    /** @var RepoApiUrl */
    private $sut;

    public function setUp(): void
    {
        $this->apiUrl = 'https://api.github.com/repos/octocat/linguist';
        $this->sut    = new RepoApiUrl($this->apiUrl);
    }

    public function testGetApiUrl(): void
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->apiUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->apiUrl, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->apiUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->apiUrl));
    }
}
