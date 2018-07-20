<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External\Service;

use DevboardLib\GitHub\External\Service\UnknownService;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\External\Service\UnknownService
 * @group  unit
 */
class UnknownServiceTest extends TestCase
{
    /** @var StatusCheckContext */
    private $context;

    /** @var UnknownService */
    private $sut;

    public function setUp(): void
    {
        $this->context = new StatusCheckContext('unknown');
        $this->sut     = new UnknownService($this->context);
    }

    public function testGetValue(): void
    {
        self::assertEquals('unknown', $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertEquals('unknown', $this->sut->__toString());
    }

    public function testGetContext(): void
    {
        self::assertEquals($this->context, $this->sut->getContext());
    }
}
