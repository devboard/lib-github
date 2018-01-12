<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\State\Success;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Status\State\Success
 * @group  unit
 */
class SuccessTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var Success */
    private $sut;

    public function setUp()
    {
        $this->sut = new Success();
    }

    public function testGetValue()
    {
        self::assertEquals('success', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('success', $this->sut->__toString());
    }

    public function testConstName()
    {
        self::assertEquals('success', $this->sut::NAME);
    }
}
