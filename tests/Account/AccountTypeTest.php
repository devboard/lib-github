<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountType
 * @group  unit
 */
class AccountTypeTest extends TestCase
{
    public function testItSupportsCreatingUserEnum(): void
    {
        self::assertInstanceOf(AccountType::class, AccountType::USER());
    }

    public function testItSupportsCreatingOrganizationEnum(): void
    {
        self::assertInstanceOf(AccountType::class, AccountType::ORGANIZATION());
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testItThrowsExceptionWhenWeTryToBuildNonExistingAccountType(): void
    {
        AccountType::ZZ();
    }
}
