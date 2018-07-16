<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\State\Failure;
use DevboardLib\GitHub\StatusCheck\StatusCheckState;
use PhpSpec\ObjectBehavior;

class FailureSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Failure::class);
        $this->shouldHaveType(StatusCheckState::class);
    }
}
