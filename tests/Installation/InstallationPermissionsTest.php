<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationPermissions;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationPermissions
 * @group  unit
 */
class InstallationPermissionsTest extends TestCase
{
    /** @var array */
    private $values;

    /** @var InstallationPermissions */
    private $sut;

    public function setUp(): void
    {
        $this->values = ['some-installation-permission', 'another-installation-permission'];
        $this->sut    = new InstallationPermissions($this->values);
    }

    public function testGetValues(): void
    {
        self::assertSame($this->values, $this->sut->getValues());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->values, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->values));
    }
}
