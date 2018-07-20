<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\External\Service\ContinuousIntegration\FabbotIo;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use PhpSpec\ObjectBehavior;

class FabbotIoSpec extends ObjectBehavior
{
    public function let(StatusCheckContext $context)
    {
        $this->beConstructedWith($context);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(FabbotIo::class);
        $this->shouldHaveType(ExternalService::class);
    }
}
