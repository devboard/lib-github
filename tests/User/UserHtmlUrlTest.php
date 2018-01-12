<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\User\UserHtmlUrl
 * @group  unit
 */
class UserHtmlUrlTest extends TestCase
{
    /** @var string */
    private $htmlUrl;

    /** @var UserHtmlUrl */
    private $sut;

    public function setUp()
    {
        $this->htmlUrl = 'https://github.com/octocat';
        $this->sut     = new UserHtmlUrl($this->htmlUrl);
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
