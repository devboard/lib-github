<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\Git\Commit\CommitSha;
use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\GitHubCommitCollectionSpec
 * @see \Tests\DevboardLib\GitHub\GitHubCommitCollectionTest
 */
class GitHubCommitCollection
{
    /** @var array|GitHubCommit[] */
    private $elements;

    /**
     * @param GitHubCommit[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, GitHubCommit::class);
        $this->elements = $elements;
    }

    public function add(GitHubCommit $element)
    {
        $this->elements[] = $element;
    }

    public function has(CommitSha $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getSha() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(CommitSha $id)
    {
        foreach ($this->elements as $element) {
            if ($element->getSha() == $id) {
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
            $elements[] = GitHubCommit::deserialize($item);
        }

        return new self($elements);
    }
}
