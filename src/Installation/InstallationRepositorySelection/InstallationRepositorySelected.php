<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation\InstallationRepositorySelection;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection;

/**
 * @see InstallationRepositorySelectedSpec
 * @see InstallationRepositorySelectedTest
 */
class InstallationRepositorySelected implements InstallationRepositorySelection
{
    const NAME = 'selected';

    public function selectedOnly(): bool
    {
        return true;
    }

    public function all(): bool
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
