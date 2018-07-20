<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\Service\ContinuousIntegration\CircleCi;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\External\Service\ContinuousIntegration\CircleCi
 * @group  unit
 */
class CircleCiTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|StatusCheckContext */
    private $context;

    /** @var CircleCi */
    private $sut;

    public function setUp(): void
    {
        $this->context = Mockery::mock(StatusCheckContext::class);
        $this->sut     = new CircleCi($this->context);
    }

    public function testGetValue(): void
    {
        self::assertEquals('CircleCI', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('CircleCI', $this->sut->asString());
    }

    public function testGetContext(): void
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
