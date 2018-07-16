<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\StatusCheck;

/**
 * @see \spec\DevboardLib\GitHub\StatusCheck\StatusCheckTargetUrlSpec
 * @see \Tests\DevboardLib\GitHub\StatusCheck\StatusCheckTargetUrlTest
 */
class StatusCheckTargetUrl
{
    /** @var string */
    private $targetUrl;

    public function __construct(string $targetUrl)
    {
        $this->targetUrl = $targetUrl;
    }

    public function getTargetUrl(): string
    {
        return $this->targetUrl;
    }

    public function getValue(): string
    {
        return $this->targetUrl;
    }

    public function __toString(): string
    {
        return $this->targetUrl;
    }

    public function serialize(): string
    {
        return $this->targetUrl;
    }

    public static function deserialize(string $targetUrl): self
    {
        return new self($targetUrl);
    }
}
