<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Status;

use DevboardLib\GitHub\Status\StatusContext;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Status\StatusContext
 * @group  unit
 */
class StatusContextTest extends TestCase
{
    /** @var string */
    private $description;

    /** @var StatusContext */
    private $sut;

    public function setUp(): void
    {
        $this->description = 'ci/circleci';
        $this->sut         = new StatusContext($this->description);
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
        self::assertEquals($this->sut, $this->sut->deserialize($this->description));
    }
}
