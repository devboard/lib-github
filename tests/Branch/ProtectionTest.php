<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\Protection;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Contexts;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\Protection
 * @group  todo
 */
class ProtectionTest extends TestCase
{
    /** @var bool */
    private $enabled;

    /** @var RequiredStatusChecks */
    private $requiredStatusChecks;

    /** @var Protection */
    private $sut;

    public function setUp()
    {
        $this->enabled              = true;
        $this->requiredStatusChecks = new RequiredStatusChecks(
            new RequiredStatusChecksEnforcementLevel('enforcementLevel'),
            new Contexts([new Context(new ContextId(1))])
        );
        $this->sut = new Protection($this->enabled, $this->requiredStatusChecks);
    }

    public function testIsEnabled()
    {
        self::assertSame($this->enabled, $this->sut->isEnabled());
    }

    public function testGetRequiredStatusChecks()
    {
        self::assertSame($this->requiredStatusChecks, $this->sut->getRequiredStatusChecks());
    }

    public function testSerialize()
    {
        $expected = [
            'enabled'              => true,
            'requiredStatusChecks' => ['enforcementLevel' => 'enforcementLevel', 'contexts' => [1]],
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, Protection::deserialize(json_decode($serialized, true)));
    }
}
