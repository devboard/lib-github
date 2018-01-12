<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Branch;

/**
 * @see \spec\DevboardLib\GitHub\Branch\BranchProtectionUrlSpec
 * @see \Tests\DevboardLib\GitHub\Branch\BranchProtectionUrlTest
 */
class BranchProtectionUrl
{
    /** @var string */
    private $protectionUrl;

    public function __construct(string $protectionUrl)
    {
        $this->protectionUrl = $protectionUrl;
    }

    public function getProtectionUrl(): string
    {
        return $this->protectionUrl;
    }

    public function getValue(): string
    {
        return $this->protectionUrl;
    }

    public function __toString(): string
    {
        return $this->protectionUrl;
    }

    public function serialize(): string
    {
        return $this->protectionUrl;
    }

    public static function deserialize(string $protectionUrl): self
    {
        return new self($protectionUrl);
    }
}
