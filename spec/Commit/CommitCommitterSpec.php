<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use Git\Commit\CommitCommitter as CommitCommitterInterface;
use PhpSpec\ObjectBehavior;

class CommitCommitterSpec extends ObjectBehavior
{
    public function let(
        CommitterName $name, EmailAddress $email, CommitDate $commitDate, CommitCommitterDetails $committerDetails
    ) {
        $this->beConstructedWith($name, $email, $commitDate, $committerDetails);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitCommitter::class);
        $this->shouldImplement(CommitCommitterInterface::class);
    }

    public function it_exposes_name(CommitterName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_email(EmailAddress $email)
    {
        $this->getEmail()->shouldReturn($email);
    }

    public function it_exposes_commit_date(CommitDate $commitDate)
    {
        $this->getCommitDate()->shouldReturn($commitDate);
    }

    public function it_exposes_committer_details(CommitCommitterDetails $committerDetails)
    {
        $this->getCommitterDetails()->shouldReturn($committerDetails);
    }

    public function it_has_committer_details()
    {
        $this->hasCommitterDetails()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        CommitterName $name, EmailAddress $email, CommitDate $commitDate, CommitCommitterDetails $committerDetails
    ) {
        $name->serialize()->shouldBeCalled()->willReturn('Jane Johnson');
        $email->serialize()->shouldBeCalled()->willReturn('jane@example.com');
        $commitDate->serialize()->shouldBeCalled()->willReturn('2018-01-02T20:21:22+00:00');
        $committerDetails->serialize()->shouldBeCalled()->willReturn(
            [
                'userId'    => 583231,
                'login'     => 'octocat',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                'siteAdmin' => true,
            ]
        );
        $this->serialize()->shouldReturn(
            [
                'name'             => 'Jane Johnson',
                'email'            => 'jane@example.com',
                'commitDate'       => '2018-01-02T20:21:22+00:00',
                'committerDetails' => [
                    'userId'    => 583231,
                    'login'     => 'octocat',
                    'type'      => 'Bot',
                    'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                    'siteAdmin' => true,
                ],
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'name'             => 'Jane Johnson',
            'email'            => 'jane@example.com',
            'commitDate'       => '2018-01-02T20:21:22+00:00',
            'committerDetails' => [
                'userId'    => 583231,
                'login'     => 'octocat',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                'siteAdmin' => true,
            ],
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitCommitter::class);
    }
}
