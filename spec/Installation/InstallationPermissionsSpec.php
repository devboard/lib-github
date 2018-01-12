<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationPermissions;
use PhpSpec\ObjectBehavior;

class InstallationPermissionsSpec extends ObjectBehavior
{
    protected $input = [
        'contents'      => 'read',
        'deployments'   => 'read',
        'issues'        => 'read',
        'metadata'      => 'read',
        'pull_requests' => 'read',
        'statuses'      => 'read',
    ];

    public function let()
    {
        $this->beConstructedWith($this->input);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationPermissions::class);
    }

    public function it_exposes_values()
    {
        $this->getValues()->shouldReturn($this->input);
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn($this->input);
    }

    public function it_can_be_deserialized()
    {
        $input = $this->input;

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationPermissions::class);
    }
}
