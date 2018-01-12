<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\Service\ContinuousIntegration\CircleCi;
use DevboardLib\GitHub\Status\StatusContext;
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

    /** @var MockInterface|StatusContext */
    private $context;

    /** @var CircleCi */
    private $sut;

    public function setUp()
    {
        $this->context = Mockery::mock(StatusContext::class);
        $this->sut     = new CircleCi($this->context);
    }

    public function testGetValue()
    {
        self::assertEquals('CircleCI', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('CircleCI', $this->sut->__toString());
    }

    public function testGetContext()
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
