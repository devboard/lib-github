<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck;

use DevboardLib\GitHub\StatusCheck\StatusCheckTargetUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\StatusCheckTargetUrl
 * @group  unit
 */
class StatusCheckTargetUrlTest extends TestCase
{
    /** @var string */
    private $targetUrl;

    /** @var StatusCheckTargetUrl */
    private $sut;

    public function setUp(): void
    {
        $this->targetUrl = 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link';
        $this->sut       = new StatusCheckTargetUrl($this->targetUrl);
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
