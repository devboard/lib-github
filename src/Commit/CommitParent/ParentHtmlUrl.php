<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\CommitParent;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrlSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrlTest
 */
class ParentHtmlUrl
{
    /** @var string */
    private $htmlUrl;

    public function __construct(string $htmlUrl)
    {
        $this->htmlUrl = $htmlUrl;
    }

    public function getHtmlUrl(): string
    {
        return $this->htmlUrl;
    }

    public function getValue(): string
    {
        return $this->htmlUrl;
    }

    public function __toString(): string
    {
        return $this->htmlUrl;
    }

    public function serialize(): string
    {
        return $this->htmlUrl;
    }

    public static function deserialize(string $htmlUrl): self
    {
        return new self($htmlUrl);
    }
}
