<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context
 * @group  unit
 */
class ContextTest extends TestCase
{
    /** @var ContextId */
    private $id;

    /** @var Context */
    private $sut;

    public function setUp(): void
    {
        $this->id  = new ContextId(1);
        $this->sut = new Context($this->id);
    }

    public function testGetId(): void
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->id->serialize(), $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, Context::deserialize(json_decode($serialized, true)));
    }
}
