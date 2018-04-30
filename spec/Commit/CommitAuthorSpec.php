<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use Git\Commit\CommitAuthor as CommitAuthorInterface;
use PhpSpec\ObjectBehavior;

class CommitAuthorSpec extends ObjectBehavior
{
    public function let(
        AuthorName $name, EmailAddress $email, CommitDate $commitDate, CommitAuthorDetails $authorDetails
    ) {
        $this->beConstructedWith($name, $email, $commitDate, $authorDetails);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitAuthor::class);
        $this->shouldImplement(CommitAuthorInterface::class);
    }

    public function it_exposes_name(AuthorName $name)
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

    public function it_exposes_author_details(CommitAuthorDetails $authorDetails)
    {
        $this->getAuthorDetails()->shouldReturn($authorDetails);
    }

    public function it_has_author_details()
    {
        $this->hasAuthorDetails()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        AuthorName $name, EmailAddress $email, CommitDate $commitDate, CommitAuthorDetails $authorDetails
    ) {
        $name->serialize()->shouldBeCalled()->willReturn('Jane Johnson');
        $email->serialize()->shouldBeCalled()->willReturn('jane@example.com');
        $commitDate->serialize()->shouldBeCalled()->willReturn('2018-01-02T20:21:22+00:00');
        $authorDetails->serialize()->shouldBeCalled()->willReturn(
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
                'name'          => 'Jane Johnson',
                'email'         => 'jane@example.com',
                'commitDate'    => '2018-01-02T20:21:22+00:00',
                'authorDetails' => [
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
            'name'          => 'Jane Johnson',
            'email'         => 'jane@example.com',
            'commitDate'    => '2018-01-02T20:21:22+00:00',
            'authorDetails' => [
                'userId'    => 583231,
                'login'     => 'octocat',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars3.githubusercontent.com/u/583231?v=4',

                'siteAdmin' => true,
            ],
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitAuthor::class);
    }
}
