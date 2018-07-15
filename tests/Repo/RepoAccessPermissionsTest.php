<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoAccessPermissions;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoAccessPermissions
 * @group  unit
 */
class RepoAccessPermissionsTest extends TestCase
{
    /** @dataProvider provideValues */
    public function testIt(bool $admin, bool $pushAllowed, bool $pullAllowed): void
    {
        $sut = new RepoAccessPermissions($admin, $pushAllowed, $pullAllowed);

        $this->assertSame($admin, $sut->isAdmin());
        $this->assertSame($pushAllowed, $sut->isPushAllowed());
        $this->assertSame($pullAllowed, $sut->isPullAllowed());
    }

    public function provideValues(): array
    {
        return [
            [true, true, true],
            [false, false, false],
            [true, false, false],
            [false, true, false],
            [false, false, true],
        ];
    }
}
