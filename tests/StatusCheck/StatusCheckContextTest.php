<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck;

use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\StatusCheckContext
 * @group  unit
 */
class StatusCheckContextTest extends TestCase
{
    /** @var string */
    private $description;

    /** @var StatusCheckContext */
    private $sut;

    public function setUp(): void
    {
        $this->description = 'ci/circleci';
        $this->sut         = new StatusCheckContext($this->description);
    }

    public function testGetDescription(): void
    {
        self::assertSame($this->description, $this->sut->getDescription());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->description, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->description, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->description, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->description));
    }
}
