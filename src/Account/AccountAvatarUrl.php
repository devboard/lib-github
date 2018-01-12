<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see \spec\DevboardLib\GitHub\Account\AccountAvatarUrlSpec
 * @see \Tests\DevboardLib\GitHub\Account\AccountAvatarUrlTest
 */
class AccountAvatarUrl
{
    /** @var string */
    private $avatarUrl;

    public function __construct(string $avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    public function getValue(): string
    {
        return $this->avatarUrl;
    }

    public function __toString(): string
    {
        return $this->avatarUrl;
    }

    public function serialize(): string
    {
        return $this->avatarUrl;
    }

    public static function deserialize(string $avatarUrl)
    {
        return new static($avatarUrl);
    }
}
