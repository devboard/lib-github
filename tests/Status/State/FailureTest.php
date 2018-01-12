<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\State\Failure;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Status\State\Failure
 * @group  unit
 */
class FailureTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Failure */
    private $sut;

    public function setUp()
    {
        $this->sut = new Failure();
    }

    public function testGetValue()
    {
        self::assertEquals('failure', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('failure', $this->sut->__toString());
    }

    public function testConstName()
    {
        self::assertEquals('failure', $this->sut::NAME);
    }
}
