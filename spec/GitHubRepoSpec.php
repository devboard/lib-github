<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoHomepage;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoLanguage;
use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubRepoSpec extends ObjectBehavior
{
    public function let(
        RepoId $id,
        RepoFullName $fullName,
        RepoOwner $owner,
        BranchName $defaultBranch,
        RepoParent $parent,
        RepoDescription $description,
        RepoHomepage $homepage,
        RepoLanguage $language,
        RepoMirrorUrl $mirrorUrl,
        RepoEndpoints $endpoints,
        RepoStats $stats,
        RepoTimestamps $timestamps
    ) {
        $this->beConstructedWith(
            $id,
            $fullName,
            $owner,
            $private = true,
            $defaultBranch,
            $fork = true,
            $parent,
            $description,
            $homepage,
            $language,
            $mirrorUrl,
            $archived = true,
            $endpoints,
            $stats,
            $timestamps
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepo::class);
    }

    public function it_exposes_id(RepoId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_full_name(RepoFullName $fullName)
    {
        $this->getFullName()->shouldReturn($fullName);
    }

    public function it_exposes_owner(RepoOwner $owner)
    {
        $this->getOwner()->shouldReturn($owner);
    }

    public function it_exposes_is_private()
    {
        $this->isPrivate()->shouldReturn(true);
    }

    public function it_exposes_default_branch(BranchName $defaultBranch)
    {
        $this->getDefaultBranch()->shouldReturn($defaultBranch);
    }

    public function it_exposes_is_fork()
    {
        $this->isFork()->shouldReturn(true);
    }

    public function it_exposes_parent(RepoParent $parent)
    {
        $this->getParent()->shouldReturn($parent);
    }

    public function it_exposes_description(RepoDescription $description)
    {
        $this->getDescription()->shouldReturn($description);
    }

    public function it_exposes_homepage(RepoHomepage $homepage)
    {
        $this->getHomepage()->shouldReturn($homepage);
    }

    public function it_exposes_language(RepoLanguage $language)
    {
        $this->getLanguage()->shouldReturn($language);
    }

    public function it_exposes_mirror_url(RepoMirrorUrl $mirrorUrl)
    {
        $this->getMirrorUrl()->shouldReturn($mirrorUrl);
    }

    public function it_exposes_is_archived()
    {
        $this->isArchived()->shouldReturn(true);
    }

    public function it_exposes_endpoints(RepoEndpoints $endpoints)
    {
        $this->getEndpoints()->shouldReturn($endpoints);
    }

    public function it_exposes_stats(RepoStats $stats)
    {
        $this->getStats()->shouldReturn($stats);
    }

    public function it_exposes_timestamps(RepoTimestamps $timestamps)
    {
        $this->getTimestamps()->shouldReturn($timestamps);
    }

    public function it_has_parent()
    {
        $this->hasParent()->shouldReturn(true);
    }

    public function it_has_description()
    {
        $this->hasDescription()->shouldReturn(true);
    }

    public function it_has_homepage()
    {
        $this->hasHomepage()->shouldReturn(true);
    }

    public function it_has_language()
    {
        $this->hasLanguage()->shouldReturn(true);
    }

    public function it_has_mirror_url()
    {
        $this->hasMirrorUrl()->shouldReturn(true);
    }

    public function it_has_archived()
    {
        $this->hasArchived()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        RepoId $id,
        RepoFullName $fullName,
        RepoOwner $owner,
        BranchName $defaultBranch,
        RepoParent $parent,
        RepoDescription $description,
        RepoHomepage $homepage,
        RepoLanguage $language,
        RepoMirrorUrl $mirrorUrl,
        RepoEndpoints $endpoints,
        RepoStats $stats,
        RepoTimestamps $timestamps
    ) {
        $id->serialize()->shouldBeCalled()->willReturn(1296269);
        $fullName->serialize()->shouldBeCalled()->willReturn(['owner' => 'devboard-test', 'repoName' => 'Hello-World']);
        $owner->serialize()->shouldBeCalled()->willReturn(
            [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                'htmlUrl'   => 'https://github.com/baxterthehacker',
                'apiUrl'    => 'https://api.github.com/users/baxterthehacker',
                'siteAdmin' => false,
            ]
        );
        $defaultBranch->serialize()->shouldBeCalled()->willReturn('production');
        $parent->serialize()->shouldBeCalled()->willReturn(
            ['id' => 1296269, 'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World']]
        );
        $description->serialize()->shouldBeCalled()->willReturn(
            'Language Savant. If your repository language is being reported incorrectly, send us a pull request!'
        );
        $homepage->serialize()->shouldBeCalled()->willReturn('http://www.example.com/');
        $language->serialize()->shouldBeCalled()->willReturn('HTML');
        $mirrorUrl->serialize()->shouldBeCalled()->willReturn('http://mirror.example.com');
        $endpoints->serialize()->shouldBeCalled()->willReturn(
            [
                'htmlUrl' => 'https://github.com/octocat/linguist',
                'apiUrl'  => 'https://api.github.com/repos/octocat/linguist',
                'gitUrl'  => 'git://github.com/octocat/linguist.git',
                'sshUrl'  => 'git@github.com:octocat/linguist.git',
            ]
        );
        $stats->serialize()->shouldBeCalled()->willReturn(
            [
                'networkCount'     => 11,
                'watchersCount'    => 12,
                'stargazersCount'  => 13,
                'subscribersCount' => 14,
                'openIssuesCount'  => 15,
                'size'             => 32899,
            ]
        );
        $timestamps->serialize()->shouldBeCalled()->willReturn(
            [
                'createdAt' => '2016-08-02T17:35:14+00:00',
                'updatedAt' => '2017-11-16T14:01:57+00:00',
                'pushedAt'  => '2017-11-17T10:26:15+00:00',
            ]
        );
        $this->serialize()->shouldReturn(
            [
                'id'       => 1296269,
                'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World'],
                'owner'    => [
                    'userId'    => 6752317,
                    'login'     => 'devboard-test',
                    'type'      => 'Bot',
                    'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                    'htmlUrl'   => 'https://github.com/baxterthehacker',
                    'apiUrl'    => 'https://api.github.com/users/baxterthehacker',
                    'siteAdmin' => false,
                ],
                'private'       => true,
                'defaultBranch' => 'production',
                'fork'          => true,
                'parent'        => ['id' => 1296269, 'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World']],
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
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'       => 1296269,
            'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World'],
            'owner'    => [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                'htmlUrl'   => 'https://github.com/baxterthehacker',
                'apiUrl'    => 'https://api.github.com/users/baxterthehacker',
                'siteAdmin' => false,
            ],
            'private'       => true,
            'defaultBranch' => 'production',
            'fork'          => true,
            'parent'        => ['id' => 1296269, 'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World']],
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
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubRepo::class);
    }
}
