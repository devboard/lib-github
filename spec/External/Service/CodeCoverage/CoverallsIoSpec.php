<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\External\Service\CodeCoverage;

use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\External\Service\CodeCoverage\CoverallsIo;
use DevboardLib\GitHub\StatusCheck\StatusCheckContext;
use PhpSpec\ObjectBehavior;

class CoverallsIoSpec extends ObjectBehavior
{
    public function let(StatusCheckContext $context)
    {
        $this->beConstructedWith($context);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CoverallsIo::class);
        $this->shouldHaveType(ExternalService::class);
    }
}
