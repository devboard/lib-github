<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositoryAll;
use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected;
use DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactory;
use DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactoryException;
use PhpSpec\ObjectBehavior;

class InstallationRepositorySelectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationRepositorySelectionFactory::class);
    }

    public function it_will_return_selected()
    {
        $this->create(InstallationRepositorySelected::NAME)
            ->shouldReturnAnInstanceOf(InstallationRepositorySelected::class);
    }

    public function it_will_return_all()
    {
        $this->create(InstallationRepositoryAll::NAME)
            ->shouldReturnAnInstanceOf(InstallationRepositoryAll::class);
    }

    public function it_will_throw_exception_on_unknown_string()
    {
        $this->shouldThrow(InstallationRepositorySelectionFactoryException::class)->duringCreate('SomeRandomName');
    }
}
