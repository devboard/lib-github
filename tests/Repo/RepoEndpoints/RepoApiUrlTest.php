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

    public function setUp()
    {
        $this->apiUrl = 'https://api.github.com/repos/octocat/linguist';
        $this->sut    = new RepoApiUrl($this->apiUrl);
    }

    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->apiUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->apiUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->apiUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->apiUrl));
    }
}
