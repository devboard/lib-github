<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\State\Success;
use DevboardLib\GitHub\StatusCheck\StatusCheckState;
use PhpSpec\ObjectBehavior;

class SuccessSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Success::class);
        $this->shouldHaveType(StatusCheckState::class);
    }
}
