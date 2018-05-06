<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequest;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\PullRequest\PullRequestBase;
use PhpSpec\ObjectBehavior;

class PullRequestBaseSpec extends ObjectBehavior
{
    public function let(BranchName $targetBranchName, GitHubRepo $repo, CommitSha $sha)
    {
        $this->beConstructedWith($targetBranchName, $repo, $sha);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestBase::class);
    }

    public function it_exposes_target_branch_name(BranchName $targetBranchName)
    {
        $this->getTargetBranchName()->shouldReturn($targetBranchName);
    }

    public function it_exposes_repo(GitHubRepo $repo)
    {
        $this->getRepo()->shouldReturn($repo);
    }

    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }

    public function it_can_be_serialized(BranchName $targetBranchName, GitHubRepo $repo, CommitSha $sha)
    {
        $targetBranchName->serialize()->shouldBeCalled()->willReturn('name');
        $repo->serialize()->shouldBeCalled()->willReturn(
            [
                'id'       => 1296269,
                'fullName' => ['owner' => 'value', 'repoName' => 'Hello-World'],
                'owner'    => [
                    'userId'    => 1,
                    'login'     => 'value',
                    'type'      => 'User',
                    'avatarUrl' => 'avatarUrl',
                    'siteAdmin' => true,
                ],
                'private'       => true,
                'defaultBranch' => 'name',
                'fork'          => true,
                'parent'        => ['id' => 1296269, 'fullName' => ['owner' => 'value', 'repoName' => 'Hello-World']],
                'description'   => 'Language Savant. If your repository language is being reported incorrectly, send us a pull request!',
                'homepage'      => 'http://www.example.com/',
                'language'      => 'HTML',
                'mirrorUrl'     => 'http://mirror.example.com',
                'archived'      => true,
                'endpoints'     => [
                    'htmlUrl' => 'https://github.com/octocat/linguist',
                    'apiUrl'  => 'https://api.github.com/repos/octocat/linguist',
                    'gitUrl'  => 'git://github.com/octocat/linguist.git',
                    'sshUrl'  => 'git@github.com:octocat/linguist.git',
                ],
                'stats' => [
                    'networkCount'     => 11,
                    'watchersCount'    => 12,
                    'stargazersCount'  => 13,
                    'subscribersCount' => 14,
                    'openIssuesCount'  => 15,
                    'size'             => 32899,
                ],
                'timestamps' => [
                    'createdAt' => '2016-08-02T17:35:14+00:00',
                    'updatedAt' => '2017-11-16T14:01:57+00:00',
                    'pushedAt'  => '2017-11-17T10:26:15+00:00',
                ],
            ]
        );
        $sha->serialize()->shouldBeCalled()->willReturn('sha');
        $this->serialize()->shouldReturn(
            [
                'targetBranchName' => 'name',
                'repo'             => [
                    'id'       => 1296269,
                    'fullName' => ['owner' => 'value', 'repoName' => 'Hello-World'],
                    'owner'    => [
                        'userId'    => 1,
                        'login'     => 'value',
                        'type'      => 'User',
                        'avatarUrl' => 'avatarUrl',
                        'siteAdmin' => true,
                    ],
                    'private'       => true,
                    'defaultBranch' => 'name',
                    'fork'          => true,
                    'parent'        => ['id' => 1296269, 'fullName' => ['owner' => 'value', 'repoName' => 'Hello-World']],
                    'description'   => 'Language Savant. If your repository language is being reported incorrectly, send us a pull request!',
                    'homepage'      => 'http://www.example.com/',
                    'language'      => 'HTML',
                    'mirrorUrl'     => 'http://mirror.example.com',
                    'archived'      => true,
                    'endpoints'     => [
                        'htmlUrl' => 'https://github.com/octocat/linguist',
                        'apiUrl'  => 'https://api.github.com/repos/octocat/linguist',
                        'gitUrl'  => 'git://github.com/octocat/linguist.git',
                        'sshUrl'  => 'git@github.com:octocat/linguist.git',
                    ],
                    'stats' => [
                        'networkCount'     => 11,
                        'watchersCount'    => 12,
                        'stargazersCount'  => 13,
                        'subscribersCount' => 14,
                        'openIssuesCount'  => 15,
                        'size'             => 32899,
                    ],
                    'timestamps' => [
                        'createdAt' => '2016-08-02T17:35:14+00:00',
                        'updatedAt' => '2017-11-16T14:01:57+00:00',
                        'pushedAt'  => '2017-11-17T10:26:15+00:00',
                    ],
                ],
                'sha' => 'sha',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'targetBranchName' => 'name',
            'repo'             => [
                'id'       => 1296269,
                'fullName' => ['owner' => 'value', 'repoName' => 'Hello-World'],
                'owner'    => [
                    'userId'    => 1,
                    'login'     => 'value',
                    'type'      => 'User',
                    'avatarUrl' => 'avatarUrl',
                    'siteAdmin' => true,
                ],
                'private'       => true,
                'defaultBranch' => 'name',
                'fork'          => true,
                'parent'        => ['id' => 1296269, 'fullName' => ['owner' => 'value', 'repoName' => 'Hello-World']],
                'description'   => 'Language Savant. If your repository language is being reported incorrectly, send us a pull request!',
                'homepage'      => 'http://www.example.com/',
                'language'      => 'HTML',
                'mirrorUrl'     => 'http://mirror.example.com',
                'archived'      => true,
                'endpoints'     => [
                    'htmlUrl' => 'https://github.com/octocat/linguist',
                    'apiUrl'  => 'https://api.github.com/repos/octocat/linguist',
                    'gitUrl'  => 'git://github.com/octocat/linguist.git',
                    'sshUrl'  => 'git@github.com:octocat/linguist.git',
                ],
                'stats' => [
                    'networkCount'     => 11,
                    'watchersCount'    => 12,
                    'stargazersCount'  => 13,
                    'subscribersCount' => 14,
                    'openIssuesCount'  => 15,
                    'size'             => 32899,
                ],
                'timestamps' => [
                    'createdAt' => '2016-08-02T17:35:14+00:00',
                    'updatedAt' => '2017-11-16T14:01:57+00:00',
                    'pushedAt'  => '2017-11-17T10:26:15+00:00',
                ],
            ],
            'sha' => 'sha',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(PullRequestBase::class);
    }
}
