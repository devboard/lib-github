<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\State\Success;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\State\Success
 * @group  unit
 */
class SuccessTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Success */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new Success();
    }

    public function testGetValue(): void
    {
        self::assertEquals('success', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('success', $this->sut->asString());
    }

    public function testConstName(): void
    {
        self::assertEquals('success', $this->sut::NAME);
    }
}
