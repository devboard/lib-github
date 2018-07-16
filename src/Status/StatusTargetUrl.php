<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status;

/**
 * @see \spec\DevboardLib\GitHub\Status\StatusTargetUrlSpec
 * @see \Tests\DevboardLib\GitHub\Status\StatusTargetUrlTest
 * @deprecated Please use StatusCheck version! Remove this in version 2.0
 */
class StatusTargetUrl
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
