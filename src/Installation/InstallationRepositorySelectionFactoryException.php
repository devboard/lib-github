<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

use Exception;

/**
 * @see InstallationRepositorySelectionFactoryExceptionSpec
 * @see InstallationRepositorySelectionFactoryExceptionTest
 */
class InstallationRepositorySelectionFactoryException extends Exception
{
    public static function create(string $name): self
    {
        $message = 'Unknown InstallationInstallationRepositorySelection with name: '.$name;

        return new self($message);
    }
}
