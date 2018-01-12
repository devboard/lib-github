<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\GitHubTag;
use DevboardLib\GitHub\GitHubTagCollection;
use PhpSpec\ObjectBehavior;

class GitHubTagCollectionSpec extends ObjectBehavior
{
    public function let(GitHubTag $gitHubTag)
    {
        $this->beConstructedWith($elements = [$gitHubTag]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTagCollection::class);
    }

    public function it_exposes_elements(GitHubTag $gitHubTag)
    {
        $this->toArray()->shouldReturn([$gitHubTag]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(GitHubTag $anotherGitHubTag)
    {
        $this->add($anotherGitHubTag);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(GitHubTag $gitHubTag, TagName $tagName)
    {
        $gitHubTag->getName()->shouldBeCalled()->willReturn($tagName);
        $this->has($tagName)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(GitHubTag $gitHubTag, TagName $tagName)
    {
        $gitHubTag->getName()->shouldBeCalled()->willReturn($tagName);
        $this->get($tagName)->shouldReturn($gitHubTag);
    }
}
