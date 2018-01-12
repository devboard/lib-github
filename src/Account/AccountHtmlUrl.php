<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see \spec\DevboardLib\GitHub\Account\AccountHtmlUrlSpec
 * @see \Tests\DevboardLib\GitHub\Account\AccountHtmlUrlTest
 */
class AccountHtmlUrl
{
    /** @var string */
    private $htmlUrl;

    public function __construct(string $htmlUrl)
    {
        $this->htmlUrl = $htmlUrl;
    }

    public function getHtmlUrl(): string
    {
        return $this->htmlUrl;
    }

    public function getValue(): string
    {
        return $this->htmlUrl;
    }

    public function __toString(): string
    {
        return $this->htmlUrl;
    }

    public function serialize(): string
    {
        return $this->htmlUrl;
    }

    public static function deserialize(string $htmlUrl)
    {
        return new static($htmlUrl);
    }
}
