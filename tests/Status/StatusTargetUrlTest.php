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

    public function setUp()
    {
        $this->targetUrl = 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link';
        $this->sut       = new StatusTargetUrl($this->targetUrl);
    }

    public function testGetTargetUrl()
    {
        self::assertSame($this->targetUrl, $this->sut->getTargetUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->targetUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->targetUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->targetUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->targetUrl));
    }
}
