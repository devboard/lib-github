<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\State\Pending;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Status\State\Pending
 * @group  unit
 */
class PendingTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Pending */
    private $sut;

    public function setUp()
    {
        $this->sut = new Pending();
    }

    public function testGetValue()
    {
        self::assertEquals('pending', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('pending', $this->sut->__toString());
    }

    public function testConstName()
    {
        self::assertEquals('pending', $this->sut::NAME);
    }
}
