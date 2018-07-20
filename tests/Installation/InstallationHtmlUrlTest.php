<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationHtmlUrl
 * @group  unit
 */
class InstallationHtmlUrlTest extends TestCase
{
    /** @var string */
    private $installationHtmlUrl;

    /** @var InstallationHtmlUrl */
    private $sut;

    public function setUp(): void
    {
        $this->installationHtmlUrl = 'installationHtmlUrl';
        $this->sut                 = new InstallationHtmlUrl($this->installationHtmlUrl);
    }

    public function testGetInstallationHtmlUrl(): void
    {
        self::assertSame($this->installationHtmlUrl, $this->sut->getInstallationHtmlUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->installationHtmlUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->installationHtmlUrl, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->installationHtmlUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->installationHtmlUrl));
    }
}
