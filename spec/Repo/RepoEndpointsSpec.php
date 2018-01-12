<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use PhpSpec\ObjectBehavior;

class RepoEndpointsSpec extends ObjectBehavior
{
    public function let(RepoHtmlUrl $htmlUrl, RepoApiUrl $apiUrl, RepoGitUrl $gitUrl, RepoSshUrl $sshUrl)
    {
        $this->beConstructedWith($htmlUrl, $apiUrl, $gitUrl, $sshUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoEndpoints::class);
    }

    public function it_exposes_html_url(RepoHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }

    public function it_exposes_api_url(RepoApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_exposes_git_url(RepoGitUrl $gitUrl)
    {
        $this->getGitUrl()->shouldReturn($gitUrl);
    }

    public function it_exposes_ssh_url(RepoSshUrl $sshUrl)
    {
        $this->getSshUrl()->shouldReturn($sshUrl);
    }

    public function it_can_be_serialized(
        RepoHtmlUrl $htmlUrl, RepoApiUrl $apiUrl, RepoGitUrl $gitUrl, RepoSshUrl $sshUrl
    ) {
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('https://github.com/octocat/Hello-World');
        $apiUrl->serialize()->shouldBeCalled()->willReturn('https://api.github.com/repos/octocat/Hello-World');
        $gitUrl->serialize()->shouldBeCalled()->willReturn('git://github.com/octocat/Hello-World.git');
        $sshUrl->serialize()->shouldBeCalled()->willReturn('git@github.com:octocat/Hello-World.git');
        $this->serialize()->shouldReturn(
            [
                'htmlUrl' => 'https://github.com/octocat/Hello-World',
                'apiUrl'  => 'https://api.github.com/repos/octocat/Hello-World',
                'gitUrl'  => 'git://github.com/octocat/Hello-World.git',
                'sshUrl'  => 'git@github.com:octocat/Hello-World.git',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'htmlUrl' => 'https://github.com/octocat/Hello-World',
            'apiUrl'  => 'https://api.github.com/repos/octocat/Hello-World',
            'gitUrl'  => 'git://github.com/octocat/Hello-World.git',
            'sshUrl'  => 'git@github.com:octocat/Hello-World.git',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoEndpoints::class);
    }
}
