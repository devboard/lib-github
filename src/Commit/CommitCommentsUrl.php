<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitCommentsUrlSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitCommentsUrlTest
 */
class CommitCommentsUrl
{
    /** @var string */
    private $commentsUrl;

    public function __construct(string $commentsUrl)
    {
        $this->commentsUrl = $commentsUrl;
    }

    public function getCommentsUrl(): string
    {
        return $this->commentsUrl;
    }

    public function getValue(): string
    {
        return $this->commentsUrl;
    }

    public function __toString(): string
    {
        return $this->commentsUrl;
    }

    public function serialize(): string
    {
        return $this->commentsUrl;
    }

    public static function deserialize(string $commentsUrl): self
    {
        return new self($commentsUrl);
    }
}
