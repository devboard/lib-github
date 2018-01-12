<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Tree;

use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\Tree\TreeApiUrl
 * @group  unit
 */
class TreeApiUrlTest extends TestCase
{
    /** @var string */
    private $apiUrl;

    /** @var TreeApiUrl */
    private $sut;

    public function setUp()
    {
        $this->apiUrl = 'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2';
        $this->sut    = new TreeApiUrl($this->apiUrl);
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
