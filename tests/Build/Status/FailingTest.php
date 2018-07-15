<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Failing;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Build\Status\Failing
 * @group  unit
 */
class FailingTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Failing */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new Failing();
    }

    public function testGetValue(): void
    {
        self::assertEquals('failing', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('failing', $this->sut->__toString());
    }

    public function testConstName(): void
    {
        self::assertEquals('failing', $this->sut::NAME);
    }
}
