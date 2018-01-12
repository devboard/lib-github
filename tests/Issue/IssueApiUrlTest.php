<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Issue\IssueApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Issue\IssueApiUrl
 * @group  todo
 */
class IssueApiUrlTest extends TestCase
{
    /** @var string */
    private $apiUrl;

    /** @var IssueApiUrl */
    private $sut;

    public function setUp()
    {
        $this->apiUrl = 'apiUrl';
        $this->sut    = new IssueApiUrl($this->apiUrl);
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
