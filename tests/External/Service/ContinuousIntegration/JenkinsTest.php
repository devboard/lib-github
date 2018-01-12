<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\Service\ContinuousIntegration\Jenkins;
use DevboardLib\GitHub\Status\StatusContext;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\External\Service\ContinuousIntegration\Jenkins
 * @group  unit
 */
class JenkinsTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|StatusContext */
    private $context;

    /** @var Jenkins */
    private $sut;

    public function setUp()
    {
        $this->context = Mockery::mock(StatusContext::class);
        $this->sut     = new Jenkins($this->context);
    }

    public function testGetValue()
    {
        self::assertEquals('Jenkins', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('Jenkins', $this->sut->__toString());
    }

    public function testGetContext()
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
