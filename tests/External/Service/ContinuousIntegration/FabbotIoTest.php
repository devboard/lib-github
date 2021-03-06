<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\Service\ContinuousIntegration\FabbotIo;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\External\Service\ContinuousIntegration\FabbotIo
 * @group  unit
 */
class FabbotIoTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|StatusCheckContext */
    private $context;

    /** @var FabbotIo */
    private $sut;

    public function setUp(): void
    {
        $this->context = Mockery::mock(StatusCheckContext::class);
        $this->sut     = new FabbotIo($this->context);
    }

    public function testGetValue(): void
    {
        self::assertEquals('fabbot.io', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('fabbot.io', $this->sut->asString());
    }

    public function testGetContext(): void
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
