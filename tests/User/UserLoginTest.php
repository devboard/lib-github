<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\User\UserLogin
 * @group  unit
 */
class UserLoginTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var UserLogin */
    private $sut;

    public function setUp()
    {
        $this->value = 'octocat';
        $this->sut   = new UserLogin($this->value);
    }

    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->value, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->value));
    }
}
