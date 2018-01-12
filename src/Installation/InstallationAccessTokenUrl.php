<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see \spec\DevboardLib\GitHub\Installation\InstallationAccessTokenUrlSpec
 * @see \Tests\DevboardLib\GitHub\Installation\InstallationAccessTokenUrlTest
 */
class InstallationAccessTokenUrl
{
    /** @var string */
    private $accessTokenUrl;

    public function __construct(string $accessTokenUrl)
    {
        $this->accessTokenUrl = $accessTokenUrl;
    }

    public function getAccessTokenUrl(): string
    {
        return $this->accessTokenUrl;
    }

    public function getId(): string
    {
        return $this->accessTokenUrl;
    }

    public function __toString(): string
    {
        return $this->accessTokenUrl;
    }

    public function serialize(): string
    {
        return $this->accessTokenUrl;
    }

    public static function deserialize(string $accessTokenUrl): self
    {
        return new self($accessTokenUrl);
    }
}
