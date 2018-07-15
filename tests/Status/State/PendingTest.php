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

    public function setUp(): void
    {
        $this->sut = new Pending();
    }

    public function testGetValue(): void
    {
        self::assertEquals('pending', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('pending', $this->sut->__toString());
    }

    public function testConstName(): void
    {
        self::assertEquals('pending', $this->sut::NAME);
    }
}
