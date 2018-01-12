<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubLabel;
use DevboardLib\GitHub\GitHubLabelCollection;
use DevboardLib\GitHub\Label\LabelId;
use PhpSpec\ObjectBehavior;

class GitHubLabelCollectionSpec extends ObjectBehavior
{
    public function let(GitHubLabel $gitHubLabel)
    {
        $this->beConstructedWith($elements = [$gitHubLabel]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubLabelCollection::class);
    }

    public function it_exposes_elements(GitHubLabel $gitHubLabel)
    {
        $this->toArray()->shouldReturn([$gitHubLabel]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(GitHubLabel $anotherGitHubLabel)
    {
        $this->add($anotherGitHubLabel);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(GitHubLabel $gitHubLabel, LabelId $labelId)
    {
        $gitHubLabel->getId()->shouldBeCalled()->willReturn($labelId);
        $this->has($labelId)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(GitHubLabel $gitHubLabel, LabelId $labelId)
    {
        $gitHubLabel->getId()->shouldBeCalled()->willReturn($labelId);
        $this->get($labelId)->shouldReturn($gitHubLabel);
    }
}
