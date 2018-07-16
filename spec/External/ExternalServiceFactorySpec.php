<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\External;

use DevboardLib\GitHub\External\ExternalServiceFactory;
use PhpSpec\ObjectBehavior;

class ExternalServiceFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ExternalServiceFactory::class);
    }
}
