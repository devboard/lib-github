<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\BranchProtectionUrl
 * @group  todo
 */
class BranchProtectionUrlTest extends TestCase
{
    /** @var string */
    private $protectionUrl;

    /** @var BranchProtectionUrl */
    private $sut;

    public function setUp()
    {
        $this->protectionUrl = 'protectionUrl';
        $this->sut           = new BranchProtectionUrl($this->protectionUrl);
    }

    public function testGetProtectionUrl()
    {
        self::assertSame($this->protectionUrl, $this->sut->getProtectionUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->protectionUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->protectionUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->protectionUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->protectionUrl));
    }
}
