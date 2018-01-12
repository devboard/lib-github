<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoParent;
use PhpSpec\ObjectBehavior;

class RepoParentSpec extends ObjectBehavior
{
    public function let(RepoId $id, RepoFullName $fullName)
    {
        $this->beConstructedWith($id, $fullName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoParent::class);
    }

    public function it_exposes_id(RepoId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_full_name(RepoFullName $fullName)
    {
        $this->getFullName()->shouldReturn($fullName);
    }

    public function it_can_be_serialized(RepoId $id, RepoFullName $fullName)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1296269);
        $fullName->serialize()->shouldBeCalled()->willReturn(['owner' => 'devboard-test', 'repoName' => 'Hello-World']);
        $this->serialize()->shouldReturn(
            ['id' => 1296269, 'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World']]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = ['id' => 1296269, 'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World']];

        $this->deserialize($input)->shouldReturnAnInstanceOf(RepoParent::class);
    }
}
