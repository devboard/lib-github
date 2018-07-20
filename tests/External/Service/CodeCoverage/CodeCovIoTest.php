<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\CodeCoverage;

use DevboardLib\GitHub\External\Service\CodeCoverage\CodeCovIo;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\External\Service\CodeCoverage\CodeCovIo
 * @group  unit
 */
class CodeCovIoTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|StatusCheckContext */
    private $context;

    /** @var CodeCovIo */
    private $sut;

    public function setUp(): void
    {
        $this->context = Mockery::mock(StatusCheckContext::class);
        $this->sut     = new CodeCovIo($this->context);
    }

    public function testGetValue(): void
    {
        self::assertEquals('CodecovIO', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('CodecovIO', $this->sut->asString());
    }

    public function testGetContext(): void
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
