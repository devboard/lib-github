<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch\Protection;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Contexts;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks
 * @group  todo
 */
class RequiredStatusChecksTest extends TestCase
{
    /** @var RequiredStatusChecksEnforcementLevel */
    private $enforcementLevel;

    /** @var Contexts */
    private $contexts;

    /** @var RequiredStatusChecks */
    private $sut;

    public function setUp()
    {
        $this->enforcementLevel = new RequiredStatusChecksEnforcementLevel('enforcementLevel');
        $this->contexts         = new Contexts([new Context(new ContextId(1))]);
        $this->sut              = new RequiredStatusChecks($this->enforcementLevel, $this->contexts);
    }

    public function testGetEnforcementLevel()
    {
        self::assertSame($this->enforcementLevel, $this->sut->getEnforcementLevel());
    }

    public function testGetContexts()
    {
        self::assertSame($this->contexts, $this->sut->getContexts());
    }

    public function testSerialize()
    {
        $expected = [
            'enforcementLevel' => 'enforcementLevel',
            'contexts'         => [1],
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RequiredStatusChecks::deserialize(json_decode($serialized, true)));
    }
}
