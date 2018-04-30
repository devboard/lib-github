<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\GitHubTag;
use DevboardLib\GitHub\Repo\RepoFullName;
use Git\Reference;
use PhpSpec\ObjectBehavior;

class GitHubTagSpec extends ObjectBehavior
{
    public function let(RepoFullName $repoFullName, TagName $name, GitHubCommit $commit)
    {
        $this->beConstructedWith($repoFullName, $name, $commit);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTag::class);
        $this->shouldImplement(Reference::class);
    }

    public function it_exposes_repo_full_name(RepoFullName $repoFullName)
    {
        $this->getRepoFullName()->shouldReturn($repoFullName);
    }

    public function it_exposes_name(TagName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_commit(GitHubCommit $commit)
    {
        $this->getCommit()->shouldReturn($commit);
    }

    public function it_can_be_serialized(RepoFullName $repoFullName, TagName $name, GitHubCommit $commit)
    {
        $repoFullName->serialize()->shouldBeCalled()->willReturn(
            ['owner' => 'devboard-test', 'repoName' => 'Hello-World']
        );
        $name->serialize()->shouldBeCalled()->willReturn('0.3');
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
        $this->serialize()->shouldReturn(
            [
                'repoFullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World'],
                'name'         => '0.3',
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
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'repoFullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World'],
            'name'         => '0.3',
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
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubTag::class);
    }
}
