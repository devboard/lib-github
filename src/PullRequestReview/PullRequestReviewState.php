<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequestReview;

use MyCLabs\Enum\Enum;

/**
 * @see \spec\DevboardLib\GitHub\PullRequestReview\PullRequestReviewStateSpec
 * @see \Tests\DevboardLib\GitHub\PullRequestReview\PullRequestReviewStateTest
 */
class PullRequestReviewState extends Enum
{
    const PENDING = 'pending';

    const APPROVED = 'approved';

    const CHANGES_REQUESTED = 'changes_requested';

    const COMMENTED = 'commented';

    const DISMISSED = 'dismissed';

    public function serialize(): string
    {
        return $this->value;
    }

    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
