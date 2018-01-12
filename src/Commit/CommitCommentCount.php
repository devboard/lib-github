<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitCommentCountSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitCommentCountTest
 */
class CommitCommentCount
{
    /** @var int */
    private $commentCount;

    public function __construct(int $commentCount)
    {
        $this->commentCount = $commentCount;
    }

    public function getCommentCount(): int
    {
        return $this->commentCount;
    }

    public function getValue(): int
    {
        return $this->commentCount;
    }

    public function __toString(): string
    {
        return (string) $this->commentCount;
    }

    public function serialize(): int
    {
        return $this->commentCount;
    }

    public static function deserialize(int $commentCount): self
    {
        return new self($commentCount);
    }
}
