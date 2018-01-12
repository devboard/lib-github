<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\State\Failure;
use DevboardLib\GitHub\Status\StatusState;
use PhpSpec\ObjectBehavior;

class FailureSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Failure::class);
        $this->shouldHaveType(StatusState::class);
    }
}
