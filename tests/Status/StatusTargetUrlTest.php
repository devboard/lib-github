<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Status;

use DevboardLib\GitHub\Status\StatusTargetUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Status\StatusTargetUrl
 * @group  unit
 */
class StatusTargetUrlTest extends TestCase
{
    /** @var string */
    private $targetUrl;

    /** @var StatusTargetUrl */
    private $sut;

    public function setUp(): void
    {
        $this->targetUrl = 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link';
        $this->sut       = new StatusTargetUrl($this->targetUrl);
    }

    public function testGetTargetUrl(): void
    {
        self::assertSame($this->targetUrl, $this->sut->getTargetUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->targetUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->targetUrl, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->targetUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->targetUrl));
    }
}
