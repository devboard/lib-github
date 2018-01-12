<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\GitHubBranchCollectionSpec
 * @see \Tests\DevboardLib\GitHub\GitHubBranchCollectionTest
 */
class GitHubBranchCollection
{
    /** @var array|GitHubBranch[] */
    private $elements;

    /**
     * @param GitHubBranch[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, GitHubBranch::class);
        $this->elements = $elements;
    }

    public function add(GitHubBranch $element)
    {
        $this->elements[] = $element;
    }

    public function has(BranchName $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(BranchName $id)
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $id) {
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
            $elements[] = GitHubBranch::deserialize($item);
        }

        return new self($elements);
    }
}
