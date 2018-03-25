<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestAuthorSpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestAuthorTest
 */
class PullRequestAuthor
{
    /** @var AccountId */
    private $userId;

    /** @var AccountLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var PullRequestAuthorAssociation|null */
    private $association;

    /** @var AccountAvatarUrl */
    private $avatarUrl;

    /** @var GravatarId */
    private $gravatarId;

    /** @var AccountHtmlUrl */
    private $htmlUrl;

    /** @var AccountApiUrl */
    private $apiUrl;

    /** @var bool */
    private $siteAdmin;

    public function __construct(
        AccountId $userId,
        AccountLogin $login,
        AccountType $type,
        ?PullRequestAuthorAssociation $association,
        AccountAvatarUrl $avatarUrl,
        GravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $this->userId      = $userId;
        $this->login       = $login;
        $this->type        = $type;
        $this->association = $association;
        $this->avatarUrl   = $avatarUrl;
        $this->gravatarId  = $gravatarId;
        $this->htmlUrl     = $htmlUrl;
        $this->apiUrl      = $apiUrl;
        $this->siteAdmin   = $siteAdmin;
    }

    public function getUserId(): AccountId
    {
        return $this->userId;
    }

    public function getLogin(): AccountLogin
    {
        return $this->login;
    }

    public function getType(): AccountType
    {
        return $this->type;
    }

    public function getAssociation(): ?PullRequestAuthorAssociation
    {
        return $this->association;
    }

    public function getAvatarUrl(): AccountAvatarUrl
    {
        return $this->avatarUrl;
    }

    public function getGravatarId(): GravatarId
    {
        return $this->gravatarId;
    }

    public function getHtmlUrl(): AccountHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): AccountApiUrl
    {
        return $this->apiUrl;
    }

    public function isSiteAdmin(): bool
    {
        return $this->siteAdmin;
    }

    public function hasAssociation(): bool
    {
        if (null === $this->association) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->association) {
            $association = null;
        } else {
            $association = $this->association->serialize();
        }

        return [
            'userId'      => $this->userId->serialize(),
            'login'       => $this->login->serialize(),
            'type'        => $this->type->serialize(),
            'association' => $association,
            'avatarUrl'   => $this->avatarUrl->serialize(),
            'gravatarId'  => $this->gravatarId->serialize(),
            'htmlUrl'     => $this->htmlUrl->serialize(),
            'apiUrl'      => $this->apiUrl->serialize(),
            'siteAdmin'   => $this->siteAdmin,
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['association']) {
            $association = null;
        } else {
            $association = PullRequestAuthorAssociation::deserialize($data['association']);
        }

        return new self(
            AccountId::deserialize($data['userId']),
            AccountLogin::deserialize($data['login']),
            AccountType::deserialize($data['type']),
            $association,
            AccountAvatarUrl::deserialize($data['avatarUrl']),
            GravatarId::deserialize($data['gravatarId']),
            AccountHtmlUrl::deserialize($data['htmlUrl']),
            AccountApiUrl::deserialize($data['apiUrl']),
            $data['siteAdmin']
        );
    }
}
