<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Issue\IssueApiUrl;
use PhpSpec\ObjectBehavior;

class IssueApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($apiUrl = 'apiUrl');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(IssueApiUrl::class);
    }

    public function it_exposes_api_url()
    {
        $this->getApiUrl()->shouldReturn('apiUrl');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('apiUrl');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('apiUrl');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('apiUrl');
    }

    public function it_can_be_deserialized()
    {
        $input = 'apiUrl';

        $this->deserialize($input)->shouldReturnAnInstanceOf(IssueApiUrl::class);
    }
}
