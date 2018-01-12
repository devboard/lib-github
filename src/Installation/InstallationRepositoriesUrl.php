<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see \spec\DevboardLib\GitHub\Installation\InstallationRepositoriesUrlSpec
 * @see \Tests\DevboardLib\GitHub\Installation\InstallationRepositoriesUrlTest
 */
class InstallationRepositoriesUrl
{
    /** @var string */
    private $installationRepositoriesUrl;

    public function __construct(string $installationRepositoriesUrl)
    {
        $this->installationRepositoriesUrl = $installationRepositoriesUrl;
    }

    public function getInstallationRepositoriesUrl(): string
    {
        return $this->installationRepositoriesUrl;
    }

    public function getValue(): string
    {
        return $this->installationRepositoriesUrl;
    }

    public function __toString(): string
    {
        return $this->installationRepositoriesUrl;
    }

    public function serialize(): string
    {
        return $this->installationRepositoriesUrl;
    }

    public static function deserialize(string $installationRepositoriesUrl): self
    {
        return new self($installationRepositoriesUrl);
    }
}
