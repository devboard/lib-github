<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation\InstallationRepositorySelection;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection;
use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositoryAll;
use PhpSpec\ObjectBehavior;

class InstallationRepositoryAllSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationRepositoryAll::class);
        $this->shouldImplement(InstallationRepositorySelection::class);
    }

    public function it_knows_it_allows_access_to_all_repos()
    {
        $this->all()->shouldReturn(true);
        $this->selectedOnly()->shouldReturn(false);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('all');
    }

    public function it_should_be_castable_to_string()
    {
        $this->asString()->shouldReturn('all');
    }
}
