<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositoriesUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositoriesUrl
 * @group  todo
 */
class InstallationRepositoriesUrlTest extends TestCase
{
    /** @var string */
    private $installationRepositoriesUrl;

    /** @var InstallationRepositoriesUrl */
    private $sut;

    public function setUp()
    {
        $this->installationRepositoriesUrl = 'installationRepositoriesUrl';
        $this->sut                         = new InstallationRepositoriesUrl($this->installationRepositoriesUrl);
    }

    public function testGetInstallationRepositoriesUrl()
    {
        self::assertSame($this->installationRepositoriesUrl, $this->sut->getInstallationRepositoriesUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->installationRepositoriesUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->installationRepositoriesUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->installationRepositoriesUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->installationRepositoriesUrl));
    }
}
