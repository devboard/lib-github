<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Passed;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Build\Status\Passed
 * @group  unit
 */
class PassedTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Passed */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new Passed();
    }

    public function testGetValue(): void
    {
        self::assertEquals('passed', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('passed', $this->sut->__toString());
    }

    public function testConstName(): void
    {
        self::assertEquals('passed', $this->sut::NAME);
    }
}
