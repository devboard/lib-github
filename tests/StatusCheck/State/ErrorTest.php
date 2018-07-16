<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\State\Error;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\State\Error
 * @group  unit
 */
class ErrorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Error */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new Error();
    }

    public function testGetValue(): void
    {
        self::assertEquals('error', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('error', $this->sut->__toString());
    }

    public function testConstName(): void
    {
        self::assertEquals('error', $this->sut::NAME);
    }
}
