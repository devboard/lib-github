<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use Git\Commit\CommitCommitter as CommitCommitterInterface;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitCommitterSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitCommitterTest
 */
class CommitCommitter implements CommitCommitterInterface
{
    /** @var CommitterName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitCommitterDetails|null */
    private $committerDetails;

    public function __construct(
        CommitterName $name, EmailAddress $email, CommitDate $commitDate, ?CommitCommitterDetails $committerDetails
    ) {
        $this->name             = $name;
        $this->email            = $email;
        $this->commitDate       = $commitDate;
        $this->committerDetails = $committerDetails;
    }

    public function hasCommitterDetails(): bool
    {
        if (null === $this->committerDetails) {
            return false;
        }

        return true;
    }

    public function getName(): CommitterName
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

    public function getCommitterDetails(): ?CommitCommitterDetails
    {
        return $this->committerDetails;
    }

    public function getUserId(): ?UserId
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getUserId();
    }

    public function getLogin(): ?UserLogin
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getLogin();
    }

    public function getAccountType(): ?AccountType
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getAccountType();
    }

    public function getAvatarUrl(): ?UserAvatarUrl
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getAvatarUrl();
    }

    public function getGravatarId(): ?GravatarId
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getGravatarId();
    }

    public function getHtmlUrl(): ?UserHtmlUrl
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getHtmlUrl();
    }

    public function getApiUrl(): ?UserApiUrl
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getApiUrl();
    }

    public function isSiteAdmin(): ?bool
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->isSiteAdmin();
    }

    public function serialize(): array
    {
        if (null === $this->committerDetails) {
            $committerDetails = null;
        } else {
            $committerDetails = $this->committerDetails->serialize();
        }

        return [
            'name'             => $this->name->serialize(),
            'email'            => $this->email->serialize(),
            'commitDate'       => $this->commitDate->serialize(),
            'committerDetails' => $committerDetails,
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['committerDetails']) {
            $committerDetails = null;
        } else {
            $committerDetails = CommitCommitterDetails::deserialize($data['committerDetails']);
        }

        return new self(
            CommitterName::deserialize($data['name']),
            EmailAddress::deserialize($data['email']),
            CommitDate::deserialize($data['commitDate']),
            $committerDetails
        );
    }
}
