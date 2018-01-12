<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountHtmlUrl
 * @group  todo
 */
class AccountHtmlUrlTest extends TestCase
{
    /** @var string */
    private $htmlUrl;

    /** @var AccountHtmlUrl */
    private $sut;

    public function setUp()
    {
        $this->htmlUrl = 'https://github.com/baxterthehacker';
        $this->sut     = new AccountHtmlUrl($this->htmlUrl);
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
