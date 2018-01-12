<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Contexts;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Contexts
 * @group  todo
 */
class ContextsTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var Contexts */
    private $sut;

    public function setUp()
    {
        $this->elements = [new Context(new ContextId(1))];
        $this->sut      = new Contexts($this->elements);
    }

    public function testGetElements()
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize()
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
