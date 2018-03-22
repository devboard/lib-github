<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Label;

use DevboardLib\GitHub\Label\LabelApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Label\LabelApiUrl
 * @group  unit
 */
class LabelApiUrlTest extends TestCase
{
    /** @var string */
    private $apiUrl;

    /** @var LabelApiUrl */
    private $sut;

    public function setUp()
    {
        $this->apiUrl = 'apiUrl';
        $this->sut    = new LabelApiUrl($this->apiUrl);
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
