<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationHtmlUrl
 * @group  todo
 */
class InstallationHtmlUrlTest extends TestCase
{
    /** @var string */
    private $installationHtmlUrl;

    /** @var InstallationHtmlUrl */
    private $sut;

    public function setUp()
    {
        $this->installationHtmlUrl = 'installationHtmlUrl';
        $this->sut                 = new InstallationHtmlUrl($this->installationHtmlUrl);
    }

    public function testGetInstallationHtmlUrl()
    {
        self::assertSame($this->installationHtmlUrl, $this->sut->getInstallationHtmlUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->installationHtmlUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->installationHtmlUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->installationHtmlUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->installationHtmlUrl));
    }
}
