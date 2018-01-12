<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositoriesUrl;
use PhpSpec\ObjectBehavior;

class InstallationRepositoriesUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($installationRepositoriesUrl = 'installationRepositoriesUrl');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationRepositoriesUrl::class);
    }

    public function it_exposes_installation_repositories_url()
    {
        $this->getInstallationRepositoriesUrl()->shouldReturn('installationRepositoriesUrl');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('installationRepositoriesUrl');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('installationRepositoriesUrl');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('installationRepositoriesUrl');
    }

    public function it_can_be_deserialized()
    {
        $input = 'installationRepositoriesUrl';

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationRepositoriesUrl::class);
    }
}
