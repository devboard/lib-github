<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo\RepoStats;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoStats\RepoSizeSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoStats\RepoSizeTest
 */
class RepoSize
{
    /** @var int */
    private $size;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getValue(): int
    {
        return $this->size;
    }

    public function __toString(): string
    {
        return (string) $this->size;
    }

    public function serialize(): int
    {
        return $this->size;
    }

    public static function deserialize(int $size): self
    {
        return new self($size);
    }
}
