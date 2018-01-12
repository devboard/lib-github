<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoDescriptionSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoDescriptionTest
 */
class RepoDescription
{
    /** @var string */
    private $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getValue(): string
    {
        return $this->description;
    }

    public function __toString(): string
    {
        return $this->description;
    }

    public function serialize(): string
    {
        return $this->description;
    }

    public static function deserialize(string $description): self
    {
        return new self($description);
    }
}
