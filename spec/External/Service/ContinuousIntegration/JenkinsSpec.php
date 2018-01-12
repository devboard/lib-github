<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\External\Service\ContinuousIntegration\Jenkins;
use DevboardLib\GitHub\Status\StatusContext;
use PhpSpec\ObjectBehavior;

class JenkinsSpec extends ObjectBehavior
{
    public function let(StatusContext $context)
    {
        $this->beConstructedWith($context);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Jenkins::class);
        $this->shouldHaveType(ExternalService::class);
    }
}
