<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see \spec\DevboardLib\GitHub\Installation\InstallationHtmlUrlSpec
 * @see \Tests\DevboardLib\GitHub\Installation\InstallationHtmlUrlTest
 */
class InstallationHtmlUrl
{
    /** @var string */
    private $installationHtmlUrl;

    public function __construct(string $installationHtmlUrl)
    {
        $this->installationHtmlUrl = $installationHtmlUrl;
    }

    public function getInstallationHtmlUrl(): string
    {
        return $this->installationHtmlUrl;
    }

    public function getValue(): string
    {
        return $this->installationHtmlUrl;
    }

    public function __toString(): string
    {
        return $this->installationHtmlUrl;
    }

    public function serialize(): string
    {
        return $this->installationHtmlUrl;
    }

    public static function deserialize(string $installationHtmlUrl): self
    {
        return new self($installationHtmlUrl);
    }
}
