<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositoriesUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositoriesUrl
 * @group  unit
 */
class InstallationRepositoriesUrlTest extends TestCase
{
    /** @var string */
    private $installationRepositoriesUrl;

    /** @var InstallationRepositoriesUrl */
    private $sut;

    public function setUp(): void
    {
        $this->installationRepositoriesUrl = 'installationRepositoriesUrl';
        $this->sut                         = new InstallationRepositoriesUrl($this->installationRepositoriesUrl);
    }

    public function testGetInstallationRepositoriesUrl(): void
    {
        self::assertSame($this->installationRepositoriesUrl, $this->sut->getInstallationRepositoriesUrl());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->installationRepositoriesUrl, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->installationRepositoriesUrl, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->installationRepositoriesUrl, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->installationRepositoriesUrl));
    }
}
