<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\PullRequest\PullRequestAuthorAssociation;
use PhpSpec\ObjectBehavior;

class PullRequestAuthorAssociationSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($value = 'COLLABORATOR');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestAuthorAssociation::class);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('COLLABORATOR');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('COLLABORATOR');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('COLLABORATOR');
    }

    public function it_can_be_deserialized()
    {
        $input = 'COLLABORATOR';

        $this->deserialize($input)->shouldReturnAnInstanceOf(PullRequestAuthorAssociation::class);
    }
}
