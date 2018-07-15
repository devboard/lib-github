<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserAvatarUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\User\UserAvatarUrl
 * @group  unit
 */
class UserAvatarUrlTest extends TestCase
{
    /** @var string */
    private $avatarUrl;

    /** @var UserAvatarUrl */
    private $sut;

    public function setUp(): void
    {
        $this->avatarUrl = 'https://avatars3.githubusercontent.com/u/583231?v=4';
        $this->sut       = new UserAvatarUrl($this->avatarUrl);
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
        self::assertSame($this->avatarUrl, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->avatarUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->avatarUrl));
    }
}
