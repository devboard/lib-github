<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use Git\Commit\CommitParent as CommitParentInterface;
use PhpSpec\ObjectBehavior;

class CommitParentSpec extends ObjectBehavior
{
    public function let(CommitSha $sha, ParentApiUrl $apiUrl, ParentHtmlUrl $htmlUrl)
    {
        $this->beConstructedWith($sha, $apiUrl, $htmlUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitParent::class);
        $this->shouldImplement(CommitParentInterface::class);
    }

    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }

    public function it_exposes_api_url(ParentApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_exposes_html_url(ParentHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }

    public function it_can_be_serialized(CommitSha $sha, ParentApiUrl $apiUrl, ParentHtmlUrl $htmlUrl)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('5246f51f550db504e76c98b641e3337570e84dd4');
        $apiUrl->serialize()->shouldBeCalled()->willReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/commits/5246f51f550db504e76c98b641e3337570e84dd4'
        );
        $htmlUrl->serialize()->shouldBeCalled()->willReturn(
            'https://github.com/symfony/symfony-docs/commit/5246f51f550db504e76c98b641e3337570e84dd4'
        );
        $this->serialize()->shouldReturn(
            [
                'sha'     => '5246f51f550db504e76c98b641e3337570e84dd4',
                'apiUrl'  => 'https://api.github.com/repos/symfony/symfony-docs/git/commits/5246f51f550db504e76c98b641e3337570e84dd4',
                'htmlUrl' => 'https://github.com/symfony/symfony-docs/commit/5246f51f550db504e76c98b641e3337570e84dd4',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'sha'     => '5246f51f550db504e76c98b641e3337570e84dd4',
            'apiUrl'  => 'https://api.github.com/repos/symfony/symfony-docs/git/commits/5246f51f550db504e76c98b641e3337570e84dd4',
            'htmlUrl' => 'https://github.com/symfony/symfony-docs/commit/5246f51f550db504e76c98b641e3337570e84dd4',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitParent::class);
    }
}
