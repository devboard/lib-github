<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoMirrorUrlSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoMirrorUrlTest
 */
class RepoMirrorUrl
{
    /** @var string */
    private $mirrorUrl;

    public function __construct(string $mirrorUrl)
    {
        $this->mirrorUrl = $mirrorUrl;
    }

    public function getMirrorUrl(): string
    {
        return $this->mirrorUrl;
    }

    public function getValue(): string
    {
        return $this->mirrorUrl;
    }

    public function __toString(): string
    {
        return $this->mirrorUrl;
    }

    public function serialize(): string
    {
        return $this->mirrorUrl;
    }

    public static function deserialize(string $mirrorUrl): self
    {
        return new self($mirrorUrl);
    }
}
