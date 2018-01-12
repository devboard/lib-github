<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Label\LabelId;
use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\GitHubLabelCollectionSpec
 * @see \Tests\DevboardLib\GitHub\GitHubLabelCollectionTest
 */
class GitHubLabelCollection
{
    /** @var array|GitHubLabel[] */
    private $elements;

    /**
     * @param GitHubLabel[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, GitHubLabel::class);
        $this->elements = $elements;
    }

    public function add(GitHubLabel $element)
    {
        $this->elements[] = $element;
    }

    public function has(LabelId $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getId() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(LabelId $id)
    {
        foreach ($this->elements as $element) {
            if ($element->getId() == $id) {
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
            $elements[] = GitHubLabel::deserialize($item);
        }

        return new self($elements);
    }
}
