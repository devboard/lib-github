<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\InProgress;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Build\Status\InProgress
 * @group  unit
 */
class InProgressTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var InProgress */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new InProgress();
    }

    public function testGetValue(): void
    {
        self::assertEquals('in_progress', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('in_progress', $this->sut->asString());
    }

    public function testConstName(): void
    {
        self::assertEquals('in_progress', $this->sut::NAME);
    }
}
