<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewId;
use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\GitHubPullRequestReviewCollectionSpec
 * @see \Tests\DevboardLib\GitHub\GitHubPullRequestReviewCollectionTest
 */
class GitHubPullRequestReviewCollection
{
    /** @var array|GitHubPullRequestReview[] */
    private $elements;

    /**
     * @param GitHubPullRequestReview[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, GitHubPullRequestReview::class);
        $this->elements = $elements;
    }

    public function add(GitHubPullRequestReview $element)
    {
        $this->elements[] = $element;
    }

    public function has(PullRequestReviewId $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getId() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(PullRequestReviewId $id)
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
            $elements[] = GitHubPullRequestReview::deserialize($item);
        }

        return new self($elements);
    }
}
