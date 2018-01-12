<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubLabel;
use DevboardLib\GitHub\Label\LabelApiUrl;
use DevboardLib\GitHub\Label\LabelColor;
use DevboardLib\GitHub\Label\LabelId;
use DevboardLib\GitHub\Label\LabelName;
use PhpSpec\ObjectBehavior;

class GitHubLabelSpec extends ObjectBehavior
{
    public function let(LabelId $id, LabelName $name, LabelColor $color, LabelApiUrl $apiUrl)
    {
        $this->beConstructedWith($id, $name, $color, $default = true, $apiUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubLabel::class);
    }

    public function it_exposes_id(LabelId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_name(LabelName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_color(LabelColor $color)
    {
        $this->getColor()->shouldReturn($color);
    }

    public function it_exposes_is_default()
    {
        $this->isDefault()->shouldReturn(true);
    }

    public function it_exposes_api_url(LabelApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_can_be_serialized(LabelId $id, LabelName $name, LabelColor $color, LabelApiUrl $apiUrl)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $name->serialize()->shouldBeCalled()->willReturn('value');
        $color->serialize()->shouldBeCalled()->willReturn('color');
        $apiUrl->serialize()->shouldBeCalled()->willReturn('apiUrl');
        $this->serialize()->shouldReturn(
            ['id' => 1, 'name' => 'value', 'color' => 'color', 'default' => true, 'apiUrl' => 'apiUrl']
        );
    }

    public function it_can_be_deserialized()
    {
        $input = ['id' => 1, 'name' => 'value', 'color' => 'color', 'default' => true, 'apiUrl' => 'apiUrl'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubLabel::class);
    }
}
