<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\State\Success;
use DevboardLib\GitHub\Status\StatusState;
use PhpSpec\ObjectBehavior;

class SuccessSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Success::class);
        $this->shouldHaveType(StatusState::class);
    }
}
