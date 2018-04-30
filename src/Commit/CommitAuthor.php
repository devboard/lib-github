<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use Git\Commit\CommitAuthor as CommitAuthorInterface;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitAuthorSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitAuthorTest
 */
class CommitAuthor implements CommitAuthorInterface
{
    /** @var AuthorName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitAuthorDetails|null */
    private $authorDetails;

    public function __construct(
        AuthorName $name, EmailAddress $email, CommitDate $commitDate, ?CommitAuthorDetails $authorDetails
    ) {
        $this->name          = $name;
        $this->email         = $email;
        $this->commitDate    = $commitDate;
        $this->authorDetails = $authorDetails;
    }

    public function hasAuthorDetails(): bool
    {
        if (null === $this->authorDetails) {
            return false;
        }

        return true;
    }

    public function getName(): AuthorName
    {
        return $this->name;
    }

    public function getEmail(): EmailAddress
    {
        return $this->email;
    }

    public function getCommitDate(): CommitDate
    {
        return $this->commitDate;
    }

    public function getAuthorDetails(): ?CommitAuthorDetails
    {
        return $this->authorDetails;
    }

    public function getUserId(): ?UserId
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getUserId();
    }

    public function getLogin(): ?UserLogin
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getLogin();
    }

    public function getAccountType(): ?AccountType
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getType();
    }

    public function getAvatarUrl(): ?UserAvatarUrl
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getAvatarUrl();
    }

    public function isSiteAdmin(): ?bool
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->isSiteAdmin();
    }

    public function serialize(): array
    {
        if (null === $this->authorDetails) {
            $authorDetails = null;
        } else {
            $authorDetails = $this->authorDetails->serialize();
        }

        return [
            'name'          => $this->name->serialize(),
            'email'         => $this->email->serialize(),
            'commitDate'    => $this->commitDate->serialize(),
            'authorDetails' => $authorDetails,
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['authorDetails']) {
            $authorDetails = null;
        } else {
            $authorDetails = CommitAuthorDetails::deserialize($data['authorDetails']);
        }

        return new self(
            AuthorName::deserialize($data['name']),
            EmailAddress::deserialize($data['email']),
            CommitDate::deserialize($data['commitDate']),
            $authorDetails
        );
    }
}
