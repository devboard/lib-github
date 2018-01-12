<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\State\Error;
use DevboardLib\GitHub\Status\StatusState;
use PhpSpec\ObjectBehavior;

class ErrorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Error::class);
        $this->shouldHaveType(StatusState::class);
    }
}
