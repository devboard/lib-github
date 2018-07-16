<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\State\Pending;
use DevboardLib\GitHub\StatusCheck\StatusCheckState;
use PhpSpec\ObjectBehavior;

class PendingSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Pending::class);
        $this->shouldHaveType(StatusCheckState::class);
    }
}
