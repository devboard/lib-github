<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitCommitterDetailsSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitCommitterDetailsTest
 */
class CommitCommitterDetails
{
    /** @var UserId */
    private $userId;

    /** @var UserLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var UserAvatarUrl */
    private $avatarUrl;

    /** @var GravatarId|null */
    private $gravatarId;

    /** @var UserHtmlUrl */
    private $htmlUrl;

    /** @var UserApiUrl */
    private $apiUrl;

    /** @var bool */
    private $siteAdmin;

    public function __construct(
        UserId $userId,
        UserLogin $login,
        AccountType $type,
        UserAvatarUrl $avatarUrl,
        ?GravatarId $gravatarId,
        UserHtmlUrl $htmlUrl,
        UserApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $this->userId     = $userId;
        $this->login      = $login;
        $this->type       = $type;
        $this->avatarUrl  = $avatarUrl;
        $this->gravatarId = $gravatarId;
        $this->htmlUrl    = $htmlUrl;
        $this->apiUrl     = $apiUrl;
        $this->siteAdmin  = $siteAdmin;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getLogin(): UserLogin
    {
        return $this->login;
    }

    public function getType(): AccountType
    {
        return $this->type;
    }

    public function getAvatarUrl(): UserAvatarUrl
    {
        return $this->avatarUrl;
    }

    public function getGravatarId(): ?GravatarId
    {
        return $this->gravatarId;
    }

    public function getHtmlUrl(): UserHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): UserApiUrl
    {
        return $this->apiUrl;
    }

    public function isSiteAdmin(): bool
    {
        return $this->siteAdmin;
    }

    public function hasGravatarId(): bool
    {
        if (null === $this->gravatarId) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->gravatarId) {
            $gravatarId = null;
        } else {
            $gravatarId = $this->gravatarId->serialize();
        }

        return [
            'userId'     => $this->userId->serialize(),
            'login'      => $this->login->serialize(),
            'type'       => $this->type->serialize(),
            'avatarUrl'  => $this->avatarUrl->serialize(),
            'gravatarId' => $gravatarId,
            'htmlUrl'    => $this->htmlUrl->serialize(),
            'apiUrl'     => $this->apiUrl->serialize(),
            'siteAdmin'  => $this->siteAdmin,
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['gravatarId']) {
            $gravatarId = null;
        } else {
            $gravatarId = GravatarId::deserialize($data['gravatarId']);
        }

        return new self(
            UserId::deserialize($data['userId']),
            UserLogin::deserialize($data['login']),
            AccountType::deserialize($data['type']),
            UserAvatarUrl::deserialize($data['avatarUrl']),
            $gravatarId,
            UserHtmlUrl::deserialize($data['htmlUrl']),
            UserApiUrl::deserialize($data['apiUrl']),
            $data['siteAdmin']
        );
    }
}
