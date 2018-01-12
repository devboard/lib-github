<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationAccessTokenUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationAccessTokenUrl
 * @group  todo
 */
class InstallationAccessTokenUrlTest extends TestCase
{
    /** @var string */
    private $accessTokenUrl;

    /** @var InstallationAccessTokenUrl */
    private $sut;

    public function setUp()
    {
        $this->accessTokenUrl = 'access-token-url';
        $this->sut            = new InstallationAccessTokenUrl($this->accessTokenUrl);
    }

    public function testGetAccessTokenUrl()
    {
        self::assertSame($this->accessTokenUrl, $this->sut->getAccessTokenUrl());
    }

    public function testGetId()
    {
        self::assertSame($this->accessTokenUrl, $this->sut->getId());
    }

    public function testToString()
    {
        self::assertSame($this->accessTokenUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->accessTokenUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->accessTokenUrl));
    }
}
