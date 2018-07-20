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

    public function setUp(): void
    {
        $this->sut = new Errored();
    }

    public function testGetValue(): void
    {
        self::assertEquals('errored', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('errored', $this->sut->asString());
    }

    public function testConstName(): void
    {
        self::assertEquals('errored', $this->sut::NAME);
    }
}
