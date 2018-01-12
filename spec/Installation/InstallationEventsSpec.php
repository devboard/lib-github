<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationEvents;
use PhpSpec\ObjectBehavior;

class InstallationEventsSpec extends ObjectBehavior
{
    protected $input = [
        'commit_comment',
        'create',
        'delete',
        'deployment',
        'deployment_status',
        'fork',
        'issues',
        'issue_comment',
        'label',
        'membership',
        'organization',
        'public',
        'pull_request',
        'pull_request_review',
        'pull_request_review_comment',
        'push',
        'release',
        'repository',
        'status',
        'team',
        'team_add',
        'watch',
    ];

    public function let()
    {
        $this->beConstructedWith($this->input);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationEvents::class);
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

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationEvents::class);
    }
}
