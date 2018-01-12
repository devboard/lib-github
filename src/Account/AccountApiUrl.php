<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see \spec\DevboardLib\GitHub\Account\AccountApiUrlSpec
 * @see \Tests\DevboardLib\GitHub\Account\AccountApiUrlTest
 */
class AccountApiUrl
{
    /** @var string */
    private $apiUrl;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function getValue(): string
    {
        return $this->apiUrl;
    }

    public function __toString(): string
    {
        return $this->apiUrl;
    }

    public function serialize(): string
    {
        return $this->apiUrl;
    }

    public static function deserialize(string $apiUrl)
    {
        return new static($apiUrl);
    }
}
