<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountId
 * @group  unit
 */
class AccountIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var AccountId */
    private $sut;

    public function setUp(): void
    {
        $this->id  = 6752317;
        $this->sut = new AccountId($this->id);
    }

    public function testGetId(): void
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testToString(): void
    {
        self::assertSame((string) $this->id, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->id));
    }
}
