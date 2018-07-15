<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubMilestone;
use DevboardLib\GitHub\Milestone\MilestoneClosedAt;
use DevboardLib\GitHub\Milestone\MilestoneCreatedAt;
use DevboardLib\GitHub\Milestone\MilestoneCreator;
use DevboardLib\GitHub\Milestone\MilestoneDescription;
use DevboardLib\GitHub\Milestone\MilestoneDueOn;
use DevboardLib\GitHub\Milestone\MilestoneId;
use DevboardLib\GitHub\Milestone\MilestoneNumber;
use DevboardLib\GitHub\Milestone\MilestoneState;
use DevboardLib\GitHub\Milestone\MilestoneTitle;
use DevboardLib\GitHub\Milestone\MilestoneUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubMilestone
 * @group  unit
 */
class GitHubMilestoneTest extends TestCase
{
    /** @var MilestoneId */
    private $id;

    /** @var MilestoneTitle */
    private $title;

    /** @var MilestoneDescription */
    private $description;

    /** @var MilestoneDueOn */
    private $dueOn;

    /** @var MilestoneState */
    private $state;

    /** @var MilestoneNumber */
    private $number;

    /** @var MilestoneCreator */
    private $creator;

    /** @var MilestoneClosedAt|null */
    private $closedAt;

    /** @var MilestoneCreatedAt */
    private $createdAt;

    /** @var MilestoneUpdatedAt */
    private $updatedAt;

    /** @var GitHubMilestone */
    private $sut;

    public function setUp(): void
    {
        $this->id          = new MilestoneId(1);
        $this->title       = new MilestoneTitle('value');
        $this->description = new MilestoneDescription('value');
        $this->dueOn       = new MilestoneDueOn('2016-08-02T17:35:14+00:00');
        $this->state       = new MilestoneState('closed');
        $this->number      = new MilestoneNumber(1);
        $this->creator     = new MilestoneCreator(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            false
        );
        $this->closedAt  = new MilestoneClosedAt('2016-08-02T17:35:14+00:00');
        $this->createdAt = new MilestoneCreatedAt('2016-08-02T17:35:14+00:00');
        $this->updatedAt = new MilestoneUpdatedAt('2016-08-02T17:35:14+00:00');
        $this->sut       = new GitHubMilestone(
            $this->id,
            $this->title,
            $this->description,
            $this->dueOn,
            $this->state,
            $this->number,
            $this->creator,
            $this->closedAt,
            $this->createdAt,
            $this->updatedAt
        );
    }

    public function testGetId(): void
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetTitle(): void
    {
        self::assertSame($this->title, $this->sut->getTitle());
    }

    public function testGetDescription(): void
    {
        self::assertSame($this->description, $this->sut->getDescription());
    }

    public function testGetDueOn(): void
    {
        self::assertSame($this->dueOn, $this->sut->getDueOn());
    }

    public function testGetState(): void
    {
        self::assertSame($this->state, $this->sut->getState());
    }

    public function testGetNumber(): void
    {
        self::assertSame($this->number, $this->sut->getNumber());
    }

    public function testGetCreator(): void
    {
        self::assertSame($this->creator, $this->sut->getCreator());
    }

    public function testGetClosedAt(): void
    {
        self::assertSame($this->closedAt, $this->sut->getClosedAt());
    }

    public function testGetCreatedAt(): void
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testGetUpdatedAt(): void
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testHasClosedAt(): void
    {
        self::assertTrue($this->sut->hasClosedAt());
    }

    public function testHasDueOn(): void
    {
        self::assertTrue($this->sut->hasDueOn());
    }

    public function testSerialize(): void
    {
        $expected = [
            'id'          => 1,
            'title'       => 'value',
            'description' => 'value',
            'dueOn'       => '2016-08-02T17:35:14+00:00',
            'state'       => 'closed',
            'number'      => 1,
            'creator'     => [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                'siteAdmin' => false,
            ],
            'closedAt'  => '2016-08-02T17:35:14+00:00',
            'createdAt' => '2016-08-02T17:35:14+00:00',
            'updatedAt' => '2016-08-02T17:35:14+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubMilestone::deserialize(json_decode($serialized, true)));
    }
}
