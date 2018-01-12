<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use PhpSpec\ObjectBehavior;

class CommitParentCollectionSpec extends ObjectBehavior
{
    public function let(CommitParent $commitParent)
    {
        $this->beConstructedWith($elements = [$commitParent]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitParentCollection::class);
    }

    public function it_exposes_elements(CommitParent $commitParent)
    {
        $this->toArray()->shouldReturn([$commitParent]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(CommitParent $anotherCommitParent)
    {
        $this->add($anotherCommitParent);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(CommitParent $commitParent, CommitSha $commitSha)
    {
        $commitParent->getSha()->shouldBeCalled()->willReturn($commitSha);
        $this->has($commitSha)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(CommitParent $commitParent, CommitSha $commitSha)
    {
        $commitParent->getSha()->shouldBeCalled()->willReturn($commitSha);
        $this->get($commitSha)->shouldReturn($commitParent);
    }
}
