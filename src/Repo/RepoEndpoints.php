<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoEndpointsSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoEndpointsTest
 */
class RepoEndpoints
{
    /** @var RepoHtmlUrl */
    private $htmlUrl;

    /** @var RepoApiUrl */
    private $apiUrl;

    /** @var RepoGitUrl */
    private $gitUrl;

    /** @var RepoSshUrl */
    private $sshUrl;

    public function __construct(RepoHtmlUrl $htmlUrl, RepoApiUrl $apiUrl, RepoGitUrl $gitUrl, RepoSshUrl $sshUrl)
    {
        $this->htmlUrl = $htmlUrl;
        $this->apiUrl  = $apiUrl;
        $this->gitUrl  = $gitUrl;
        $this->sshUrl  = $sshUrl;
    }

    public function getHtmlUrl(): RepoHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): RepoApiUrl
    {
        return $this->apiUrl;
    }

    public function getGitUrl(): RepoGitUrl
    {
        return $this->gitUrl;
    }

    public function getSshUrl(): RepoSshUrl
    {
        return $this->sshUrl;
    }

    public function serialize(): array
    {
        return [
            'htmlUrl' => $this->htmlUrl->serialize(),
            'apiUrl'  => $this->apiUrl->serialize(),
            'gitUrl'  => $this->gitUrl->serialize(),
            'sshUrl'  => $this->sshUrl->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            RepoHtmlUrl::deserialize($data['htmlUrl']),
            RepoApiUrl::deserialize($data['apiUrl']),
            RepoGitUrl::deserialize($data['gitUrl']),
            RepoSshUrl::deserialize($data['sshUrl'])
        );
    }
}
