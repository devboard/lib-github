<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

use MyCLabs\Enum\Enum;

/**
 * @see AccountTypeSpec
 * @see AccountTypeTest
 */
class AccountType extends Enum
{
    const ORGANIZATION = 'Organization';

    const USER = 'User';

    const BOT = 'Bot';

    public function asString(): string
    {
        return $this->value;
    }

    public function serialize(): string
    {
        return $this->value;
    }

    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
