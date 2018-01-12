<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoLanguageSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoLanguageTest
 */
class RepoLanguage
{
    /** @var string */
    private $language;

    public function __construct(string $language)
    {
        $this->language = $language;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getValue(): string
    {
        return $this->language;
    }

    public function __toString(): string
    {
        return $this->language;
    }

    public function serialize(): string
    {
        return $this->language;
    }

    public static function deserialize(string $language): self
    {
        return new self($language);
    }
}
