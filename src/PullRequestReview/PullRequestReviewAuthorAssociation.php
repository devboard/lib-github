<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequestReview;

use MyCLabs\Enum\Enum;

/**
 * @see \spec\DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociationSpec
 * @see \Tests\DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociationTest
 */
class PullRequestReviewAuthorAssociation extends Enum
{
    const COLLABORATOR = 'COLLABORATOR';

    const OWNER = 'OWNER';

    const CONTRIBUTOR = 'CONTRIBUTOR';

    const NONE = 'NONE';

    public function serialize(): string
    {
        return $this->value;
    }

    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
