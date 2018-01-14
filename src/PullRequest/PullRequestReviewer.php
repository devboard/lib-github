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
 * @see PullRequestReviewerSpec
 * @see PullRequestReviewerTest
 */
class PullRequestReviewer
{
    /** @var AccountId */
    private $userId;

    /** @var AccountLogin */
    private $login;

    /** @var AccountType */
    private $gitHubAccountType;

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
        AccountType $gitHubAccountType,
        AccountAvatarUrl $avatarUrl,
        GravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $this->userId            = $userId;
        $this->login             = $login;
        $this->gitHubAccountType = $gitHubAccountType;
        $this->avatarUrl         = $avatarUrl;
        $this->gravatarId        = $gravatarId;
        $this->htmlUrl           = $htmlUrl;
        $this->apiUrl            = $apiUrl;
        $this->siteAdmin         = $siteAdmin;
    }

    public function getUserId(): AccountId
    {
        return $this->userId;
    }

    public function getLogin(): AccountLogin
    {
        return $this->login;
    }

    public function getAccountType(): AccountType
    {
        return $this->gitHubAccountType;
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

    public function serialize(): array
    {
        return [
            'userId'      => $this->userId->serialize(),
            'login'       => $this->login->serialize(),
            'accountType' => $this->gitHubAccountType->serialize(),
            'avatarUrl'   => $this->avatarUrl->serialize(),
            'gravatarId'  => $this->gravatarId->serialize(),
            'htmlUrl'     => $this->htmlUrl->serialize(),
            'apiUrl'      => $this->apiUrl->serialize(),
            'siteAdmin'   => $this->siteAdmin,
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            AccountId::deserialize($data['userId']),
            AccountLogin::deserialize($data['login']),
            AccountType::deserialize($data['accountType']),
            AccountAvatarUrl::deserialize($data['avatarUrl']),
            GravatarId::deserialize($data['gravatarId']),
            AccountHtmlUrl::deserialize($data['htmlUrl']),
            AccountApiUrl::deserialize($data['apiUrl']),
            $data['siteAdmin']
        );
    }
}
