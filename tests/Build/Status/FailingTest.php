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

    public function setUp()
    {
        $this->sut = new Failing();
    }

    public function testGetValue()
    {
        self::assertEquals('failing', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('failing', $this->sut->__toString());
    }

    public function testConstName()
    {
        self::assertEquals('failing', $this->sut::NAME);
    }
}
