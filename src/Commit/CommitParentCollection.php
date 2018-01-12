<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use Git\Commit\CommitParentCollection as CommitParentCollectionInterface;
use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitParentCollectionSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitParentCollectionTest
 */
class CommitParentCollection implements CommitParentCollectionInterface
{
    /** @var array|CommitParent[] */
    private $elements;

    /**
     * @param CommitParent[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, CommitParent::class);
        $this->elements = $elements;
    }

    public function add(CommitParent $element)
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
            $elements[] = CommitParent::deserialize($item);
        }

        return new self($elements);
    }
}
