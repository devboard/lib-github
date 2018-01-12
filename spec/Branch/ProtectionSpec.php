<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\Protection;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;
use PhpSpec\ObjectBehavior;

class ProtectionSpec extends ObjectBehavior
{
    public function let(RequiredStatusChecks $requiredStatusChecks)
    {
        $this->beConstructedWith($enabled = true, $requiredStatusChecks);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Protection::class);
    }

    public function it_exposes_is_enabled()
    {
        $this->isEnabled()->shouldReturn(true);
    }

    public function it_exposes_required_status_checks(RequiredStatusChecks $requiredStatusChecks)
    {
        $this->getRequiredStatusChecks()->shouldReturn($requiredStatusChecks);
    }

    public function it_can_be_serialized(RequiredStatusChecks $requiredStatusChecks)
    {
        $requiredStatusChecks->serialize()->shouldBeCalled()->willReturn(
            ['enforcementLevel' => 'enforcementLevel', 'contexts' => [1]]
        );
        $this->serialize()->shouldReturn(
            [
                'enabled'              => true,
                'requiredStatusChecks' => ['enforcementLevel' => 'enforcementLevel', 'contexts' => [1]],
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'enabled'              => true,
            'requiredStatusChecks' => ['enforcementLevel' => 'enforcementLevel', 'contexts' => [1]],
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(Protection::class);
    }
}
