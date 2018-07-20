<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountAvatarUrl
 * @group  unit
 */
class AccountAvatarUrlTest extends TestCase
{
    /** @var string */
    private $avatarUrl;

    /** @var AccountAvatarUrl */
    private $sut;

    public function setUp(): void
    {
        $this->avatarUrl = 'https://avatars.githubusercontent.com/u/6752317?v=3';
        $this->sut       = new AccountAvatarUrl($this->avatarUrl);
    }

    public function testGetAvatarUrl(): void
    {
        self::assertSame($this->avatarUrl, $this->sut->getAvatarUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->avatarUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->avatarUrl, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->avatarUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->avatarUrl));
    }
}
