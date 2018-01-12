<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Tree;

use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use PhpSpec\ObjectBehavior;

class TreeApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(
            $apiUrl = 'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2'
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TreeApiUrl::class);
    }

    public function it_exposes_api_url()
    {
        $this->getApiUrl()->shouldReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2'
        );
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2'
        );
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2'
        );
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2'
        );
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2';

        $this->deserialize($input)->shouldReturnAnInstanceOf(TreeApiUrl::class);
    }
}
