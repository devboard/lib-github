<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Failed;
use PhpSpec\ObjectBehavior;

class FailedSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Failed::class);
    }
}
