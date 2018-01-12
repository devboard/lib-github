<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\Git\Tag\TagName;
use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\GitHubTagCollectionSpec
 * @see \Tests\DevboardLib\GitHub\GitHubTagCollectionTest
 */
class GitHubTagCollection
{
    /** @var array|GitHubTag[] */
    private $elements;

    /**
     * @param GitHubTag[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, GitHubTag::class);
        $this->elements = $elements;
    }

    public function add(GitHubTag $element)
    {
        $this->elements[] = $element;
    }

    public function has(TagName $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(TagName $id)
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
            $elements[] = GitHubTag::deserialize($item);
        }

        return new self($elements);
    }
}
