<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\StatusCheck;

use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\StatusCheck\StatusCheckIdSpec
 * @see \Tests\DevboardLib\GitHub\StatusCheck\StatusCheckIdTest
 */
class StatusCheckId
{
    /** @var int */
    private $id;

    public function __construct(int $id)
    {
        Assert::greaterThan($id, 0, 'StatusCheckId has to be greater than 0.');
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function serialize(): int
    {
        return $this->id;
    }

    public static function deserialize(int $id): self
    {
        return new self($id);
    }
}
