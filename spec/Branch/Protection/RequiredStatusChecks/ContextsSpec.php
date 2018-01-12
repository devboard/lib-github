<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Contexts;
use PhpSpec\ObjectBehavior;

class ContextsSpec extends ObjectBehavior
{
    public function let(Context $context)
    {
        $this->beConstructedWith($elements = [$context]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Contexts::class);
    }

    public function it_exposes_elements(Context $context)
    {
        $this->toArray()->shouldReturn([$context]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(Context $anotherContext)
    {
        $this->add($anotherContext);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(Context $context, ContextId $contextId)
    {
        $context->getId()->shouldBeCalled()->willReturn($contextId);
        $this->has($contextId)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(Context $context, ContextId $contextId)
    {
        $context->getId()->shouldBeCalled()->willReturn($contextId);
        $this->get($contextId)->shouldReturn($context);
    }
}
