<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Created;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Build\Status\Created
 * @group  unit
 */
class CreatedTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Created */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new Created();
    }

    public function testGetValue(): void
    {
        self::assertEquals('created', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('created', $this->sut->__toString());
    }

    public function testConstName(): void
    {
        self::assertEquals('created', $this->sut::NAME);
    }
}
