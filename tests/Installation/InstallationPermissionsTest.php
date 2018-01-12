<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationPermissions;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationPermissions
 * @group  todo
 */
class InstallationPermissionsTest extends TestCase
{
    /** @var array */
    private $values;

    /** @var InstallationPermissions */
    private $sut;

    public function setUp()
    {
        $this->values = ['some-installation-permission', 'another-installation-permission'];
        $this->sut    = new InstallationPermissions($this->values);
    }

    public function testGetValues()
    {
        self::assertSame($this->values, $this->sut->getValues());
    }

    public function testSerialize()
    {
        self::assertEquals($this->values, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->values));
    }
}
