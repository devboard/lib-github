<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountAvatarUrl
 * @group  todo
 */
class AccountAvatarUrlTest extends TestCase
{
    /** @var string */
    private $avatarUrl;

    /** @var AccountAvatarUrl */
    private $sut;

    public function setUp()
    {
        $this->avatarUrl = 'https://avatars.githubusercontent.com/u/6752317?v=3';
        $this->sut       = new AccountAvatarUrl($this->avatarUrl);
    }

    public function testGetAvatarUrl()
    {
        self::assertSame($this->avatarUrl, $this->sut->getAvatarUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->avatarUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->avatarUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->avatarUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->avatarUrl));
    }
}
