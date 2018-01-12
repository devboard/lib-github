<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\Status\Created;
use PhpSpec\ObjectBehavior;

class CreatedSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Created::class);
    }
}
