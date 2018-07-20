<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use MyCLabs\Enum\Enum;

/**
 * @see PullRequestStateSpec
 * @see PullRequestStateTest
 */
class PullRequestState extends Enum
{
    const OPEN = 'open';

    const CLOSED = 'closed';

    const MERGED = 'merged';

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
