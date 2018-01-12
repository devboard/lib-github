<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoAccessPermissions;
use PhpSpec\ObjectBehavior;

class RepoAccessPermissionsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(true, true, true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoAccessPermissions::class);
    }

    public function it_will_expose_each_permission()
    {
        $this->isAdmin()->shouldReturn(true);
        $this->isPushAllowed()->shouldReturn(true);
        $this->isPullAllowed()->shouldReturn(true);
    }
}
