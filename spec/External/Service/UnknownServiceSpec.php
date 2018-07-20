<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\External\Service;

use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\External\Service\UnknownService;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use PhpSpec\ObjectBehavior;

class UnknownServiceSpec extends ObjectBehavior
{
    public function let(StatusCheckContext $context)
    {
        $this->beConstructedWith($context);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UnknownService::class);
        $this->shouldHaveType(ExternalService::class);
    }
}
