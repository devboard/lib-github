<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitApiUrl
 * @group  unit
 */
class CommitApiUrlTest extends TestCase
{
    /** @var string */
    private $apiUrl;

    /** @var CommitApiUrl */
    private $sut;

    public function setUp()
    {
        $this->apiUrl = 'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47';
        $this->sut    = new CommitApiUrl($this->apiUrl);
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
