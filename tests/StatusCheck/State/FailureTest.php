<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\State\Failure;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\State\Failure
 * @group  unit
 */
class FailureTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Failure */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new Failure();
    }

    public function testGetValue(): void
    {
        self::assertEquals('failure', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('failure', $this->sut->asString());
    }

    public function testConstName(): void
    {
        self::assertEquals('failure', $this->sut::NAME);
    }
}
