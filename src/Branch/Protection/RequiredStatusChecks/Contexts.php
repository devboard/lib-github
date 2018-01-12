<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use Webmozart\Assert\Assert;

/**
 * @see \spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\ContextsSpec
 * @see \Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\ContextsTest
 */
class Contexts
{
    /** @var array|Context[] */
    private $elements;

    /**
     * @param Context[] $elements
     */
    public function __construct(array $elements = [])
    {
        Assert::allIsInstanceOf($elements, Context::class);
        $this->elements = $elements;
    }

    public function add(Context $element)
    {
        $this->elements[] = $element;
    }

    public function has(ContextId $id): bool
    {
        foreach ($this->elements as $element) {
            if ($element->getId() == $id) {
                return true;
            }
        }

        return false;
    }

    public function get(ContextId $id)
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
            $elements[] = Context::deserialize($item);
        }

        return new self($elements);
    }
}
