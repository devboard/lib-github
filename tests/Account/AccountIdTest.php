<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountId
 * @group  todo
 */
class AccountIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var AccountId */
    private $sut;

    public function setUp()
    {
        $this->id  = 6752317;
        $this->sut = new AccountId($this->id);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testToString()
    {
        self::assertSame((string) $this->id, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->id));
    }
}
