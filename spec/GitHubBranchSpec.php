<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\Repo\RepoFullName;
use Git\Reference;
use PhpSpec\ObjectBehavior;

class GitHubBranchSpec extends ObjectBehavior
{
    public function let(
        RepoFullName $repoFullName, BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl
    ) {
        $this->beConstructedWith($repoFullName, $name, $commit, $protected = false, $protectionUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranch::class);
        $this->shouldImplement(Reference::class);
    }

    public function it_exposes_repo_full_name(RepoFullName $repoFullName)
    {
        $this->getRepoFullName()->shouldReturn($repoFullName);
    }

    public function it_exposes_name(BranchName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_commit(GitHubCommit $commit)
    {
        $this->getCommit()->shouldReturn($commit);
    }

    public function it_exposes_is_protected()
    {
        $this->isProtected()->shouldReturn(false);
    }

    public function it_exposes_protection_url(BranchProtectionUrl $protectionUrl)
    {
        $this->getProtectionUrl()->shouldReturn($protectionUrl);
    }

    public function it_has_protected()
    {
        $this->hasProtected()->shouldReturn(true);
    }

    public function it_has_protection_url()
    {
        $this->hasProtectionUrl()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        RepoFullName $repoFullName, BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl
    ) {
        $repoFullName->serialize()->shouldBeCalled()->willReturn(
            ['owner' => 'devboard-test', 'repoName' => 'Hello-World']
        );
        $name->serialize()->shouldBeCalled()->willReturn('master');
        $commit->serialize()->shouldBeCalled()->willReturn(
            [
                'sha'        => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                'message'    => 'A commit message',
                'commitDate' => '2018-01-02T11:12:13+00:00',
                'author'     => [
                    'name'          => 'Amy Johnson',
                    'email'         => 'amy@example.com',
                    'commitDate'    => '2018-01-02T11:12:13+00:00',
                    'authorDetails' => [
                        'userId'    => 583231,
                        'login'     => 'octocat',
                        'type'      => 'Bot',
                        'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                        'htmlUrl'   => 'https://github.com/octocat',
                        'apiUrl'    => 'https://api.github.com/users/octocat',
                        'siteAdmin' => true,
                    ],
                ],
                'committer' => [
                    'name'             => 'Amy Johnson',
                    'email'            => 'amy@example.com',
                    'commitDate'       => '2018-01-02T11:12:13+00:00',
                    'committerDetails' => [
                        'userId'    => 583231,
                        'login'     => 'octocat',
                        'type'      => 'Bot',
                        'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                        'htmlUrl'   => 'https://github.com/octocat',
                        'apiUrl'    => 'https://api.github.com/users/octocat',
                        'siteAdmin' => true,
                    ],
                ],
                'tree' => [
                    'sha'    => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                    'apiUrl' => 'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2',
                ],
                'parents' => [
                    ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'],
                ],
                'verification' => [
                    'verified'  => false,
                    'reason'    => 'valid',
                    'signature' => '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----',
                    'payload'   => 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...',
                ],
                'apiUrl'  => 'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47',
                'htmlUrl' => 'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47',
            ]
        );
        $protectionUrl->serialize()->shouldBeCalled()->willReturn('protectionUrl');
        $this->serialize()->shouldReturn(
            [
                'repoFullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World'],
                'name'         => 'master',
                'commit'       => [
                    'sha'        => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                    'message'    => 'A commit message',
                    'commitDate' => '2018-01-02T11:12:13+00:00',
                    'author'     => [
                        'name'          => 'Amy Johnson',
                        'email'         => 'amy@example.com',
                        'commitDate'    => '2018-01-02T11:12:13+00:00',
                        'authorDetails' => [
                            'userId'    => 583231,
                            'login'     => 'octocat',
                            'type'      => 'Bot',
                            'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                            'htmlUrl'   => 'https://github.com/octocat',
                            'apiUrl'    => 'https://api.github.com/users/octocat',
                            'siteAdmin' => true,
                        ],
                    ],
                    'committer' => [
                        'name'             => 'Amy Johnson',
                        'email'            => 'amy@example.com',
                        'commitDate'       => '2018-01-02T11:12:13+00:00',
                        'committerDetails' => [
                            'userId'    => 583231,
                            'login'     => 'octocat',
                            'type'      => 'Bot',
                            'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                            'htmlUrl'   => 'https://github.com/octocat',
                            'apiUrl'    => 'https://api.github.com/users/octocat',
                            'siteAdmin' => true,
                        ],
                    ],
                    'tree' => [
                        'sha'    => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                        'apiUrl' => 'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2',
                    ],
                    'parents' => [
                        [
                            'sha'     => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                            'apiUrl'  => 'apiUrl',
                            'htmlUrl' => 'htmlUrl',
                        ],
                    ],
                    'verification' => [
                        'verified'  => false,
                        'reason'    => 'valid',
                        'signature' => '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----',
                        'payload'   => 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...',
                    ],
                    'apiUrl'  => 'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47',
                    'htmlUrl' => 'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47',
                ],
                'protected'     => false,
                'protectionUrl' => 'protectionUrl',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'repoFullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World'],
            'name'         => 'master',
            'commit'       => [
                'sha'        => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                'message'    => 'A commit message',
                'commitDate' => '2018-01-02T11:12:13+00:00',
                'author'     => [
                    'name'          => 'Amy Johnson',
                    'email'         => 'amy@example.com',
                    'commitDate'    => '2018-01-02T11:12:13+00:00',
                    'authorDetails' => [
                        'userId'    => 583231,
                        'login'     => 'octocat',
                        'type'      => 'Bot',
                        'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                        'htmlUrl'   => 'https://github.com/octocat',
                        'apiUrl'    => 'https://api.github.com/users/octocat',
                        'siteAdmin' => true,
                    ],
                ],
                'committer' => [
                    'name'             => 'Amy Johnson',
                    'email'            => 'amy@example.com',
                    'commitDate'       => '2018-01-02T11:12:13+00:00',
                    'committerDetails' => [
                        'userId'    => 583231,
                        'login'     => 'octocat',
                        'type'      => 'Bot',
                        'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                        'htmlUrl'   => 'https://github.com/octocat',
                        'apiUrl'    => 'https://api.github.com/users/octocat',
                        'siteAdmin' => true,
                    ],
                ],
                'tree' => [
                    'sha'    => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                    'apiUrl' => 'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2',
                ],
                'parents' => [
                    ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'],
                ],
                'verification' => [
                    'verified'  => false,
                    'reason'    => 'valid',
                    'signature' => '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----',
                    'payload'   => 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...',
                ],
                'apiUrl'  => 'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47',
                'htmlUrl' => 'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47',
            ],
            'protected'     => false,
            'protectionUrl' => 'protectionUrl',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubBranch::class);
    }
}
