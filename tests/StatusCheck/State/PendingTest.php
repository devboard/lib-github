<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\State\Pending;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\State\Pending
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
        self::assertEquals('pending', $this->sut->asString());
    }

    public function testConstName(): void
    {
        self::assertEquals('pending', $this->sut::NAME);
    }
}
