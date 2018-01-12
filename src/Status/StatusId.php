<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status;

/**
 * @see \spec\DevboardLib\GitHub\Status\StatusIdSpec
 * @see \Tests\DevboardLib\GitHub\Status\StatusIdTest
 */
class StatusId
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
