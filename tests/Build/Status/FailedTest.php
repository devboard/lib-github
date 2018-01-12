<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Failed;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Build\Status\Failed
 * @group  unit
 */
class FailedTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Failed */
    private $sut;

    public function setUp()
    {
        $this->sut = new Failed();
    }

    public function testGetValue()
    {
        self::assertEquals('failed', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('failed', $this->sut->__toString());
    }

    public function testConstName()
    {
        self::assertEquals('failed', $this->sut::NAME);
    }
}
