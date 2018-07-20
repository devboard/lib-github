<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\CodeCoverage;

use DevboardLib\GitHub\External\Service\CodeCoverage\CoverallsIo;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\External\Service\CodeCoverage\CoverallsIo
 * @group  unit
 */
class CoverallsIoTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|StatusCheckContext */
    private $context;

    /** @var CoverallsIo */
    private $sut;

    public function setUp(): void
    {
        $this->context = Mockery::mock(StatusCheckContext::class);
        $this->sut     = new CoverallsIo($this->context);
    }

    public function testGetValue(): void
    {
        self::assertEquals('CoverallsIO', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('CoverallsIO', $this->sut->__toString());
    }

    public function testGetContext(): void
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
