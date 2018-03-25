<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use MyCLabs\Enum\Enum;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestAuthorAssociationSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestAuthorAssociationTest
 */
class PullRequestAuthorAssociation extends Enum
{
    const COLLABORATOR = 'COLLABORATOR';

    const OWNER = 'OWNER';

    const CONTRIBUTOR = 'CONTRIBUTOR';

    const MEMBER = 'MEMBER';

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
