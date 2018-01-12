<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\User\UserApiUrl
 * @group  unit
 */
class UserApiUrlTest extends TestCase
{
    /** @var string */
    private $apiUrl;

    /** @var UserApiUrl */
    private $sut;

    public function setUp()
    {
        $this->apiUrl = 'https://api.github.com/users/octocat';
        $this->sut    = new UserApiUrl($this->apiUrl);
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
