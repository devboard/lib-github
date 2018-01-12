<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\External\Service\CodeCoverage;

use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\External\Service\CodeCoverage\CodeCovIo;
use DevboardLib\GitHub\Status\StatusContext;
use PhpSpec\ObjectBehavior;

class CodeCovIoSpec extends ObjectBehavior
{
    public function let(StatusContext $context)
    {
        $this->beConstructedWith($context);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CodeCovIo::class);
        $this->shouldHaveType(ExternalService::class);
    }
}
