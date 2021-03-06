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

        self::assertSame($admin, $sut->isAdmin());
        self::assertSame($pushAllowed, $sut->isPushAllowed());
        self::assertSame($pullAllowed, $sut->isPullAllowed());
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
