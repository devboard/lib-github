<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\Service\ContinuousIntegration\AppVeyor;
use DevboardLib\GitHub\Status\StatusContext;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\External\Service\ContinuousIntegration\AppVeyor
 * @group  unit
 */
class AppVeyorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|StatusContext */
    private $context;

    /** @var AppVeyor */
    private $sut;

    public function setUp(): void
    {
        $this->context = Mockery::mock(StatusContext::class);
        $this->sut     = new AppVeyor($this->context);
    }

    public function testGetValue(): void
    {
        self::assertEquals('AppVeyor', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('AppVeyor', $this->sut->__toString());
    }

    public function testGetContext(): void
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
