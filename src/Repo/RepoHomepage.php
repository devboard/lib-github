<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoHomepageSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoHomepageTest
 */
class RepoHomepage
{
    /** @var string */
    private $homepage;

    public function __construct(string $homepage)
    {
        $this->homepage = $homepage;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function getValue(): string
    {
        return $this->homepage;
    }

    public function __toString(): string
    {
        return $this->homepage;
    }

    public function serialize(): string
    {
        return $this->homepage;
    }

    public static function deserialize(string $homepage): self
    {
        return new self($homepage);
    }
}
