<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\StatusCheck;

use DevboardLib\GitHub\StatusCheck\StatusCheckTargetUrl;
use PhpSpec\ObjectBehavior;

class StatusCheckTargetUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(
            $targetUrl = 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link'
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(StatusCheckTargetUrl::class);
    }

    public function it_exposes_target_url()
    {
        $this->getTargetUrl()->shouldReturn(
            'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link'
        );
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(
            'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link'
        );
    }

    public function it_is_castable_to_string()
    {
        $this->asString()->shouldReturn(
            'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link'
        );
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(
            'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link'
        );
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link';

        $this->deserialize($input)->shouldReturnAnInstanceOf(StatusCheckTargetUrl::class);
    }
}
