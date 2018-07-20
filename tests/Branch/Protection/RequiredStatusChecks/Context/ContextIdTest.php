<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId
 * @group  unit
 */
class ContextIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var ContextId */
    private $sut;

    public function setUp(): void
    {
        $this->id  = 1;
        $this->sut = new ContextId($this->id);
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
