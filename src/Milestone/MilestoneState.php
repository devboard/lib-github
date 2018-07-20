<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Milestone;

use MyCLabs\Enum\Enum;

/**
 * @see MilestoneStateSpec
 * @see MilestoneStateTest
 */
class MilestoneState extends Enum
{
    const OPEN = 'open';

    const CLOSED = 'closed';

    public function asString(): string
    {
        return $this->value;
    }

    public function serialize(): string
    {
        return $this->value;
    }

    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
