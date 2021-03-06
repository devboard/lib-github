<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Passed;
use PhpSpec\ObjectBehavior;

class PassedSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Passed::class);
    }
}
