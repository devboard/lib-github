<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Failing;
use PhpSpec\ObjectBehavior;

class FailingSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Failing::class);
    }
}
