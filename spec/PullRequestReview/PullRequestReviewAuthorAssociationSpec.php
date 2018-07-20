<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociation;
use PhpSpec\ObjectBehavior;

class PullRequestReviewAuthorAssociationSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($value = 'COLLABORATOR');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PullRequestReviewAuthorAssociation::class);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('COLLABORATOR');
    }

    public function it_is_castable_to_string()
    {
        $this->asString()->shouldReturn('COLLABORATOR');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('COLLABORATOR');
    }

    public function it_can_be_deserialized()
    {
        $input = 'COLLABORATOR';

        $this->deserialize($input)->shouldReturnAnInstanceOf(PullRequestReviewAuthorAssociation::class);
    }
}
