<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\Service\ContinuousIntegration\Jenkins;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
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

    /** @var MockInterface|StatusCheckContext */
    private $context;

    /** @var Jenkins */
    private $sut;

    public function setUp(): void
    {
        $this->context = Mockery::mock(StatusCheckContext::class);
        $this->sut     = new Jenkins($this->context);
    }

    public function testGetValue(): void
    {
        self::assertEquals('Jenkins', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('Jenkins', $this->sut->asString());
    }

    public function testGetContext(): void
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
