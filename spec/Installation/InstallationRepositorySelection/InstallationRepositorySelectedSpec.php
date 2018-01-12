<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation\InstallationRepositorySelection;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection;
use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected;
use PhpSpec\ObjectBehavior;

class InstallationRepositorySelectedSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationRepositorySelected::class);
        $this->shouldImplement(InstallationRepositorySelection::class);
    }

    public function it_knows_it_allows_access_to_only_selected_repos()
    {
        $this->selectedOnly()->shouldReturn(true);
        $this->all()->shouldReturn(false);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('selected');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('selected');
    }
}
