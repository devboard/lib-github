<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DateTime;
use DevboardLib\GitHub\Installation\InstallationCreatedAt;
use PhpSpec\ObjectBehavior;

class InstallationCreatedAtSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('2018-01-01T11:22:33+00:00');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationCreatedAt::class);
        $this->shouldHaveType(DateTime::class);
    }

    public function it_can_be_created_from_custom_format()
    {
        $result = $this->createFromFormat(DateTime::ATOM, '2018-01-01T11:22:33Z');
        $result->asString()->shouldReturn('2018-01-01T11:22:33+00:00');
    }

    public function it_is_castable_to_string()
    {
        $this->asString()->shouldReturn('2018-01-01T11:22:33+00:00');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('2018-01-01T11:22:33+00:00');
    }

    public function it_is_deserializable()
    {
        $this->deserialize('2018-01-01T11:22:33+00:00')->shouldReturnAnInstanceOf(InstallationCreatedAt::class);
    }
}
