<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoNameSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoNameTest
 */
class RepoName
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function serialize(): string
    {
        return $this->name;
    }

    public static function deserialize(string $name): self
    {
        return new self($name);
    }
}
