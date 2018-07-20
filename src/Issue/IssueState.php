<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Issue;

use MyCLabs\Enum\Enum;

/**
 * @see IssueStateSpec
 * @see IssueStateTest
 */
class IssueState extends Enum
{
    const OPEN = 'open';

    const CLOSED = 'closed';

    public function serialize(): string
    {
        return $this->value;
    }

    public function asString(): string
    {
        return $this->value;
    }

    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
