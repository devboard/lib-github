<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use Git\Commit\CommitTree as CommitTreeInterface;
use PhpSpec\ObjectBehavior;

class CommitTreeSpec extends ObjectBehavior
{
    public function let(CommitSha $sha, TreeApiUrl $apiUrl)
    {
        $this->beConstructedWith($sha, $apiUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitTree::class);
        $this->shouldImplement(CommitTreeInterface::class);
    }

    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }

    public function it_exposes_api_url(TreeApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_can_be_serialized(CommitSha $sha, TreeApiUrl $apiUrl)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
        $apiUrl->serialize()->shouldBeCalled()->willReturn(
            'https://api.github.com/repos/baxterthehacker/public-repo/git/trees/02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0'
        );
        $this->serialize()->shouldReturn(
            [
                'sha'    => '02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
                'apiUrl' => 'https://api.github.com/repos/baxterthehacker/public-repo/git/trees/02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'sha'    => '02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
            'apiUrl' => 'https://api.github.com/repos/baxterthehacker/public-repo/git/trees/02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitTree::class);
    }
}
