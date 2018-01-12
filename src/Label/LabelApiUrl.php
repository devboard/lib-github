<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Label;

/**
 * @see \spec\DevboardLib\GitHub\Label\LabelApiUrlSpec
 * @see \Tests\DevboardLib\GitHub\Label\LabelApiUrlTest
 */
class LabelApiUrl
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

    public static function deserialize(string $apiUrl): self
    {
        return new self($apiUrl);
    }
}
