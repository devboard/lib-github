<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\External\Service;

use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\External\Service\UnknownService;
use DevboardLib\GitHub\Status\StatusContext;
use PhpSpec\ObjectBehavior;

class UnknownServiceSpec extends ObjectBehavior
{
    public function let(StatusContext $context)
    {
        $this->beConstructedWith($context);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UnknownService::class);
        $this->shouldHaveType(ExternalService::class);
    }
}
