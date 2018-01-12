<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Repo\RepoFullName;
use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\GitHubRepoCollectionSpec
 * @see \Tests\DevboardLib\GitHub\GitHubRepoCollectionTest
 */
class GitHubRepoCollection
{
    /** @var array|GitHubRepo[] */
    private $elements;

    /**
     * @param GitHubRepo[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, GitHubRepo::class);
        $this->elements = $elements;
    }

    public function add(GitHubRepo $element)
    {
        $this->elements[] = $element;
    }

    public function has(RepoFullName $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getFullName() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(RepoFullName $id)
    {
        foreach ($this->elements as $element) {
            if ($element->getFullName() == $id) {
                return $element;
            }
        }

        return null;
    }

    public function toArray(): array
    {
        return $this->elements;
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function serialize(): array
    {
        $data = [];
        foreach ($this->elements as $element) {
            $data[] = $element->serialize();
        }

        return $data;
    }

    public static function deserialize(array $data): self
    {
        $elements = [];
        foreach ($data as $item) {
            $elements[] = GitHubRepo::deserialize($item);
        }

        return new self($elements);
    }
}
