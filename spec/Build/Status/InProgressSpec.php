<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\InProgress;
use PhpSpec\ObjectBehavior;

class InProgressSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(InProgress::class);
    }
}
