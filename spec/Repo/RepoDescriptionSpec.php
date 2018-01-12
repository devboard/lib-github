<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoDescription;
use PhpSpec\ObjectBehavior;

class RepoDescriptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(
            $description = 'Language Savant. If your repository language is being reported incorrectly, send us a pull request!'
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoDescription::class);
    }

    public function it_exposes_description()
    {
        $this->getDescription()->shouldReturn(
            'Language Savant. If your repository language is being reported incorrectly, send us a pull request!'
        );
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(
            'Language Savant. If your repository language is being reported incorrectly, send us a pull request!'
        );
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn(
            'Language Savant. If your repository language is being reported incorrectly, send us a pull request!'
        );
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(
            'Language Savant. If your repository language is being reported incorrectly, send us a pull request!'
        );
    }

    public function it_can_be_deserialized()
    {
        $input = 'Language Savant. If your repository language is being reported incorrectly, send us a pull request!';

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoDescription::class);
    }
}
