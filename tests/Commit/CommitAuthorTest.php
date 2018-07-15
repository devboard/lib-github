<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\Commit\CommitAuthor
 * @group  unit
 */
class CommitAuthorTest extends TestCase
{
    /** @var AuthorName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitAuthorDetails|null */
    private $authorDetails;

    /** @var CommitAuthor */
    private $sut;

    public function setUp(): void
    {
        $this->name          = new AuthorName('Jane Johnson');
        $this->email         = new EmailAddress('jane@example.com');
        $this->commitDate    = new CommitDate('2018-01-02T20:21:22+00:00');
        $this->authorDetails = new CommitAuthorDetails(
            new UserId(583231),
            new UserLogin('octocat'),
            new AccountType('Bot'),
            new UserAvatarUrl('https://avatars3.githubusercontent.com/u/583231?v=4'),
            true
        );
        $this->sut = new CommitAuthor($this->name, $this->email, $this->commitDate, $this->authorDetails);
    }

    public function testGetName(): void
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetEmail(): void
    {
        self::assertSame($this->email, $this->sut->getEmail());
    }

    public function testGetCommitDate(): void
    {
        self::assertSame($this->commitDate, $this->sut->getCommitDate());
    }

    public function testGetAuthorDetails(): void
    {
        self::assertSame($this->authorDetails, $this->sut->getAuthorDetails());
    }

    public function testHasAuthorDetails(): void
    {
        self::assertTrue($this->sut->hasAuthorDetails());
    }

    public function testSerialize(): void
    {
        $expected = [
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

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitAuthor::deserialize(json_decode($serialized, true)));
    }
}
