<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @see \spec\DevboardLib\GitHub\PullRequest\PullRequestMergedBySpec
 * @see \Tests\DevboardLib\GitHub\PullRequest\PullRequestMergedByTest
 */
class PullRequestMergedBy
{
    /** @var UserId */
    private $userId;

    /** @var UserLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var UserAvatarUrl */
    private $avatarUrl;

    /** @var bool */
    private $siteAdmin;

    public function __construct(
        UserId $userId, UserLogin $login, AccountType $type, UserAvatarUrl $avatarUrl, bool $siteAdmin
    ) {
        $this->userId    = $userId;
        $this->login     = $login;
        $this->type      = $type;
        $this->avatarUrl = $avatarUrl;
        $this->siteAdmin = $siteAdmin;
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

    public function isSiteAdmin(): bool
    {
        return $this->siteAdmin;
    }

    public function serialize(): array
    {
        return [
            'userId'    => $this->userId->serialize(),
            'login'     => $this->login->serialize(),
            'type'      => $this->type->serialize(),
            'avatarUrl' => $this->avatarUrl->serialize(),
            'siteAdmin' => $this->siteAdmin,
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            UserId::deserialize($data['userId']),
            UserLogin::deserialize($data['login']),
            AccountType::deserialize($data['type']),
            UserAvatarUrl::deserialize($data['avatarUrl']),
            $data['siteAdmin']
        );
    }
}
