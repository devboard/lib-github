<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service\CodeCoverage;

use DevboardLib\GitHub\External\Service\CodeCoverage\CodeCovIo;
use DevboardLib\GitHub\Status\StatusContext;
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

    /** @var MockInterface|StatusContext */
    private $context;

    /** @var CodeCovIo */
    private $sut;

    public function setUp()
    {
        $this->context = Mockery::mock(StatusContext::class);
        $this->sut     = new CodeCovIo($this->context);
    }

    public function testGetValue()
    {
        self::assertEquals('CodeCove.io', $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals('CodeCove.io', $this->sut->__toString());
    }

    public function testGetContext()
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
