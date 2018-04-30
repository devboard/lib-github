<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\Commit\CommitCommitter
 * @group  unit
 */
class CommitCommitterTest extends TestCase
{
    /** @var CommitterName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitCommitterDetails|null */
    private $committerDetails;

    /** @var CommitCommitter */
    private $sut;

    public function setUp()
    {
        $this->name             = new CommitterName('Jane Johnson');
        $this->email            = new EmailAddress('jane@example.com');
        $this->commitDate       = new CommitDate('2018-01-02T20:21:22+00:00');
        $this->committerDetails = new CommitCommitterDetails(
            new UserId(583231),
            new UserLogin('octocat'),
            new AccountType('Bot'),
            new UserAvatarUrl('https://avatars3.githubusercontent.com/u/583231?v=4'),
            true
        );
        $this->sut = new CommitCommitter($this->name, $this->email, $this->commitDate, $this->committerDetails);
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetEmail()
    {
        self::assertSame($this->email, $this->sut->getEmail());
    }

    public function testGetCommitDate()
    {
        self::assertSame($this->commitDate, $this->sut->getCommitDate());
    }

    public function testGetCommitterDetails()
    {
        self::assertSame($this->committerDetails, $this->sut->getCommitterDetails());
    }

    public function testHasCommitterDetails()
    {
        self::assertTrue($this->sut->hasCommitterDetails());
    }

    public function testSerialize()
    {
        $expected = [
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

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitCommitter::deserialize(json_decode($serialized, true)));
    }
}
