<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositoryAll;
use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected;

/**
 * @see InstallationRepositorySelectionFactorySpec
 * @see InstallationRepositorySelectionFactoryTest
 */
class InstallationRepositorySelectionFactory
{
    public static function create(string $name): InstallationRepositorySelection
    {
        if (InstallationRepositoryAll::NAME === $name) {
            return new InstallationRepositoryAll();
        } elseif (InstallationRepositorySelected::NAME === $name) {
            return new InstallationRepositorySelected();
        }

        throw InstallationRepositorySelectionFactoryException::create($name);
    }
}
