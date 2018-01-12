<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\State\Pending;
use DevboardLib\GitHub\Status\StatusState;
use PhpSpec\ObjectBehavior;

class PendingSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Pending::class);
        $this->shouldHaveType(StatusState::class);
    }
}
