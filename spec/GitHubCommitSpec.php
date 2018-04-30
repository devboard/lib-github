<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\CommitMessage;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitApiUrl;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitHtmlUrl;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\GitHubCommit;
use Git\Commit;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubCommitSpec extends ObjectBehavior
{
    public function let(
        CommitSha $sha,
        CommitMessage $message,
        CommitDate $commitDate,
        CommitAuthor $author,
        CommitCommitter $committer,
        CommitTree $tree,
        CommitParentCollection $parents,
        CommitVerification $verification,
        CommitApiUrl $apiUrl,
        CommitHtmlUrl $htmlUrl
    ) {
        $this->beConstructedWith(
            $sha, $message, $commitDate, $author, $committer, $tree, $parents, $verification, $apiUrl, $htmlUrl
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommit::class);
        $this->shouldImplement(Commit::class);
    }

    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }

    public function it_exposes_message(CommitMessage $message)
    {
        $this->getMessage()->shouldReturn($message);
    }

    public function it_exposes_commit_date(CommitDate $commitDate)
    {
        $this->getCommitDate()->shouldReturn($commitDate);
    }

    public function it_exposes_author(CommitAuthor $author)
    {
        $this->getAuthor()->shouldReturn($author);
    }

    public function it_exposes_committer(CommitCommitter $committer)
    {
        $this->getCommitter()->shouldReturn($committer);
    }

    public function it_exposes_tree(CommitTree $tree)
    {
        $this->getTree()->shouldReturn($tree);
    }

    public function it_exposes_parents(CommitParentCollection $parents)
    {
        $this->getParents()->shouldReturn($parents);
    }

    public function it_exposes_verification(CommitVerification $verification)
    {
        $this->getVerification()->shouldReturn($verification);
    }

    public function it_exposes_api_url(CommitApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_exposes_html_url(CommitHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }

    public function it_has_verification()
    {
        $this->hasVerification()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        CommitSha $sha,
        CommitMessage $message,
        CommitDate $commitDate,
        CommitAuthor $author,
        CommitCommitter $committer,
        CommitTree $tree,
        CommitParentCollection $parents,
        CommitVerification $verification,
        CommitApiUrl $apiUrl,
        CommitHtmlUrl $htmlUrl
    ) {
        $sha->serialize()->shouldBeCalled()->willReturn('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
        $message->serialize()->shouldBeCalled()->willReturn('A commit message');
        $commitDate->serialize()->shouldBeCalled()->willReturn('2018-01-02T11:12:13+00:00');
        $author->serialize()->shouldBeCalled()->willReturn(
            [
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
            ]
        );
        $committer->serialize()->shouldBeCalled()->willReturn(
            [
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
            ]
        );
        $tree->serialize()->shouldBeCalled()->willReturn(
            [
                'sha'    => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                'apiUrl' => 'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2',
            ]
        );
        $parents->serialize()->shouldBeCalled()->willReturn(
            [['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']]
        );
        $verification->serialize()->shouldBeCalled()->willReturn(
            [
                'verified'  => false,
                'reason'    => 'valid',
                'signature' => '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----',
                'payload'   => 'tree 691272480426f78a0138979dd3ce63b77f706feb\n...',
            ]
        );
        $apiUrl->serialize()->shouldBeCalled()->willReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47'
        );
        $htmlUrl->serialize()->shouldBeCalled()->willReturn(
            'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47'
        );
        $this->serialize()->shouldReturn(
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
    }

    public function it_can_be_deserialized()
    {
        $input = [
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
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubCommit::class);
    }
}
