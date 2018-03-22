<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Milestone;

use DateTime;
use DevboardLib\GitHub\Milestone\MilestoneDueOn;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Milestone\MilestoneDueOn
 * @group  unit
 */
class MilestoneDueOnTest extends TestCase
{
    /** @var MilestoneDueOn */
    private $sut;

    public function setUp()
    {
        $this->sut = new MilestoneDueOn('2018-01-01T11:22:33+00:00');
    }

    public function testCreateFromFormat()
    {
        $result = $this->sut::createFromFormat(DateTime::ATOM, '2018-01-01T11:22:33Z');
        self::assertEquals('2018-01-01T11:22:33+00:00', $result->__toString());
    }

    public function testToString()
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize('2018-01-01T11:22:33+00:00'));
    }
}
