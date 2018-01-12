<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;

/**
 * @see \spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextIdSpec
 * @see \Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextIdTest
 */
class ContextId
{
    /** @var int */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function serialize(): int
    {
        return $this->id;
    }

    public static function deserialize(int $id): self
    {
        return new self($id);
    }
}
