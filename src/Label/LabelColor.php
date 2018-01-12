<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Label;

/**
 * @see \spec\DevboardLib\GitHub\Label\LabelColorSpec
 * @see \Tests\DevboardLib\GitHub\Label\LabelColorTest
 */
class LabelColor
{
    /** @var string */
    private $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getValue(): string
    {
        return $this->color;
    }

    public function __toString(): string
    {
        return $this->color;
    }

    public function serialize(): string
    {
        return $this->color;
    }

    public static function deserialize(string $color): self
    {
        return new self($color);
    }
}
