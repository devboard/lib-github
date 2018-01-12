<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use PhpSpec\ObjectBehavior;

class RepoStatsSpec extends ObjectBehavior
{
    public function let(RepoSize $size)
    {
        $this->beConstructedWith(
            $networkCount = 11,
            $watchersCount = 12,
            $stargazersCount = 13,
            $subscribersCount = 14,
            $openIssuesCount = 15,
            $size
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoStats::class);
    }

    public function it_exposes_network_count()
    {
        $this->getNetworkCount()->shouldReturn(11);
    }

    public function it_exposes_watchers_count()
    {
        $this->getWatchersCount()->shouldReturn(12);
    }

    public function it_exposes_stargazers_count()
    {
        $this->getStargazersCount()->shouldReturn(13);
    }

    public function it_exposes_subscribers_count()
    {
        $this->getSubscribersCount()->shouldReturn(14);
    }

    public function it_exposes_open_issues_count()
    {
        $this->getOpenIssuesCount()->shouldReturn(15);
    }

    public function it_exposes_size(RepoSize $size)
    {
        $this->getSize()->shouldReturn($size);
    }

    public function it_can_be_serialized(RepoSize $size)
    {
        $size->serialize()->shouldBeCalled()->willReturn(16);
        $this->serialize()->shouldReturn(
            [
                'networkCount'     => 11,
                'watchersCount'    => 12,
                'stargazersCount'  => 13,
                'subscribersCount' => 14,
                'openIssuesCount'  => 15,
                'size'             => 16,
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'networkCount'     => 11,
            'watchersCount'    => 12,
            'stargazersCount'  => 13,
            'subscribersCount' => 14,
            'openIssuesCount'  => 15,
            'size'             => 16,
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoStats::class);
    }
}
