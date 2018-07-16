<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\State\Error;
use DevboardLib\GitHub\StatusCheck\StatusCheckState;
use PhpSpec\ObjectBehavior;

class ErrorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Error::class);
        $this->shouldHaveType(StatusCheckState::class);
    }
}
