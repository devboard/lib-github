<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId
 * @group  todo
 */
class ContextIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var ContextId */
    private $sut;

    public function setUp()
    {
        $this->id  = 1;
        $this->sut = new ContextId($this->id);
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
