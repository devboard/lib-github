<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationHtmlUrl;
use PhpSpec\ObjectBehavior;

class InstallationHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($installationHtmlUrl = 'installationHtmlUrl');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationHtmlUrl::class);
    }

    public function it_exposes_installation_html_url()
    {
        $this->getInstallationHtmlUrl()->shouldReturn('installationHtmlUrl');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('installationHtmlUrl');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('installationHtmlUrl');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('installationHtmlUrl');
    }

    public function it_can_be_deserialized()
    {
        $input = 'installationHtmlUrl';

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationHtmlUrl::class);
    }
}
