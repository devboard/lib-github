<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Errored;
use PhpSpec\ObjectBehavior;

class ErroredSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Errored::class);
    }
}
