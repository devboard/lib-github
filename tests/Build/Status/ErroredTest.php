<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Errored;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Build\Status\Errored
 * @group  unit
 */
class ErroredTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Errored */
    private $sut;

    public function setUp()
    {
        $this->sut = new Errored();
    }

    public function testGetValue()
    {
        self::assertEquals('errored', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('errored', $this->sut->__toString());
    }

    public function testConstName()
    {
        self::assertEquals('errored', $this->sut::NAME);
    }
}
