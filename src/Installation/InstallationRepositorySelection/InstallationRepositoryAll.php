<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation\InstallationRepositorySelection;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection;

/**
 * @see InstallationRepositoryAllSpec
 * @see InstallationRepositoryAllTest
 */
class InstallationRepositoryAll implements InstallationRepositorySelection
{
    const NAME = 'all';

    public function all(): bool
    {
        return true;
    }

    public function selectedOnly(): bool
    {
        return false;
    }

    public function getValue(): string
    {
        return self::NAME;
    }

    public function asString(): string
    {
        return self::NAME;
    }

    /**
     * @deprecated Please use `asString()`
     */
    public function __toString(): string
    {
        return self::NAME;
    }

    public function serialize(): string
    {
        return self::NAME;
    }
}
