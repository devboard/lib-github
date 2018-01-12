<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoGitUrl;
use PhpSpec\ObjectBehavior;

class RepoGitUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('git://github.com/devboard-test/super-library.git');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoGitUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('git://github.com/devboard-test/super-library.git');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('git://github.com/devboard-test/super-library.git');
    }
}
