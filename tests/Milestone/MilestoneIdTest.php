<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Milestone;

use DevboardLib\GitHub\Milestone\MilestoneId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Milestone\MilestoneId
 * @group  unit
 */
class MilestoneIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var MilestoneId */
    private $sut;

    public function setUp(): void
    {
        $this->id  = 1;
        $this->sut = new MilestoneId($this->id);
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
