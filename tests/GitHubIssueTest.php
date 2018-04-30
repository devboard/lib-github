<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubIssue;
use DevboardLib\GitHub\GitHubLabel;
use DevboardLib\GitHub\GitHubLabelCollection;
use DevboardLib\GitHub\GitHubMilestone;
use DevboardLib\GitHub\Issue\IssueAssignee;
use DevboardLib\GitHub\Issue\IssueAssigneeCollection;
use DevboardLib\GitHub\Issue\IssueAuthor;
use DevboardLib\GitHub\Issue\IssueBody;
use DevboardLib\GitHub\Issue\IssueClosedAt;
use DevboardLib\GitHub\Issue\IssueCreatedAt;
use DevboardLib\GitHub\Issue\IssueId;
use DevboardLib\GitHub\Issue\IssueNumber;
use DevboardLib\GitHub\Issue\IssueState;
use DevboardLib\GitHub\Issue\IssueTitle;
use DevboardLib\GitHub\Issue\IssueUpdatedAt;
use DevboardLib\GitHub\Label\LabelApiUrl;
use DevboardLib\GitHub\Label\LabelColor;
use DevboardLib\GitHub\Label\LabelId;
use DevboardLib\GitHub\Label\LabelName;
use DevboardLib\GitHub\Milestone\MilestoneApiUrl;
use DevboardLib\GitHub\Milestone\MilestoneClosedAt;
use DevboardLib\GitHub\Milestone\MilestoneCreatedAt;
use DevboardLib\GitHub\Milestone\MilestoneCreator;
use DevboardLib\GitHub\Milestone\MilestoneDescription;
use DevboardLib\GitHub\Milestone\MilestoneDueOn;
use DevboardLib\GitHub\Milestone\MilestoneHtmlUrl;
use DevboardLib\GitHub\Milestone\MilestoneId;
use DevboardLib\GitHub\Milestone\MilestoneNumber;
use DevboardLib\GitHub\Milestone\MilestoneState;
use DevboardLib\GitHub\Milestone\MilestoneTitle;
use DevboardLib\GitHub\Milestone\MilestoneUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubIssue
 * @group  unit
 */
class GitHubIssueTest extends TestCase
{
    /** @var IssueId */
    private $id;

    /** @var IssueNumber */
    private $number;

    /** @var IssueTitle */
    private $title;

    /** @var IssueBody */
    private $body;

    /** @var IssueState */
    private $state;

    /** @var IssueAuthor */
    private $author;

    /** @var IssueAssignee|null */
    private $assignee;

    /** @var IssueAssigneeCollection */
    private $assignees;

    /** @var GitHubLabelCollection */
    private $labels;

    /** @var GitHubMilestone|null */
    private $milestone;

    /** @var IssueClosedAt|null */
    private $closedAt;

    /** @var IssueCreatedAt */
    private $createdAt;

    /** @var IssueUpdatedAt */
    private $updatedAt;

    /** @var GitHubIssue */
    private $sut;

    public function setUp()
    {
        $this->id     = new IssueId(1);
        $this->number = new IssueNumber(1);
        $this->title  = new IssueTitle('value');
        $this->body   = new IssueBody('value');
        $this->state  = new IssueState('closed');
        $this->author = new IssueAuthor(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            false
        );

        $this->assignee = new IssueAssignee(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            false
        );
        $this->assignees = new IssueAssigneeCollection(
            [
                new IssueAssignee(
                    new AccountId(6752317),
                    new AccountLogin('devboard-test'),
                    new AccountType('Bot'),
                    new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
                    false
                ),
            ]
        );
        $this->labels = new GitHubLabelCollection(
            [
                new GitHubLabel(
                    new LabelId(1),
                    new LabelName('value'),
                    new LabelColor('color'),
                    true,
                    new LabelApiUrl('apiUrl')
                ),
            ]
        );
        $this->milestone = new GitHubMilestone(
            new MilestoneId(1),
            new MilestoneTitle('value'),
            new MilestoneDescription('value'),
            new MilestoneDueOn('2016-08-02T17:35:14+00:00'),
            new MilestoneState('closed'),
            new MilestoneNumber(1),
            new MilestoneCreator(
                new AccountId(6752317),
                new AccountLogin('devboard-test'),
                new AccountType('Bot'),
                new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
                false
            ),
            new MilestoneHtmlUrl('htmlUrl'),
            new MilestoneApiUrl('apiUrl'),
            new MilestoneClosedAt('2016-08-02T17:35:14+00:00'),
            new MilestoneCreatedAt('2016-08-02T17:35:14+00:00'),
            new MilestoneUpdatedAt('2016-08-02T17:35:14+00:00')
        );
        $this->closedAt  = new IssueClosedAt('2016-08-02T17:35:14+00:00');
        $this->createdAt = new IssueCreatedAt('2016-08-02T17:35:14+00:00');
        $this->updatedAt = new IssueUpdatedAt('2016-08-02T17:35:14+00:00');
        $this->sut       = new GitHubIssue(
            $this->id,
            $this->number,
            $this->title,
            $this->body,
            $this->state,
            $this->author,
            $this->assignee,
            $this->assignees,
            $this->labels,
            $this->milestone,
            $this->closedAt,
            $this->createdAt,
            $this->updatedAt
        );
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetNumber()
    {
        self::assertSame($this->number, $this->sut->getNumber());
    }

    public function testGetTitle()
    {
        self::assertSame($this->title, $this->sut->getTitle());
    }

    public function testGetBody()
    {
        self::assertSame($this->body, $this->sut->getBody());
    }

    public function testGetState()
    {
        self::assertSame($this->state, $this->sut->getState());
    }

    public function testGetAuthor()
    {
        self::assertSame($this->author, $this->sut->getAuthor());
    }

    public function testGetAssignee()
    {
        self::assertSame($this->assignee, $this->sut->getAssignee());
    }

    public function testGetAssignees()
    {
        self::assertSame($this->assignees, $this->sut->getAssignees());
    }

    public function testGetLabels()
    {
        self::assertSame($this->labels, $this->sut->getLabels());
    }

    public function testGetMilestone()
    {
        self::assertSame($this->milestone, $this->sut->getMilestone());
    }

    public function testGetClosedAt()
    {
        self::assertSame($this->closedAt, $this->sut->getClosedAt());
    }

    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testHasAssignee()
    {
        self::assertTrue($this->sut->hasAssignee());
    }

    public function testHasMilestone()
    {
        self::assertTrue($this->sut->hasMilestone());
    }

    public function testHasClosedAt()
    {
        self::assertTrue($this->sut->hasClosedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'id'     => 1,
            'number' => 1,
            'title'  => 'value',
            'body'   => 'value',
            'state'  => 'closed',
            'author' => [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                'siteAdmin' => false,
            ],
            'assignee' => [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                'siteAdmin' => false,
            ],
            'assignees' => [
                [
                    'userId'    => 6752317,
                    'login'     => 'devboard-test',
                    'type'      => 'Bot',
                    'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                    'siteAdmin' => false,
                ],
            ],
            'labels'    => [['id' => 1, 'name' => 'value', 'color' => 'color', 'default' => true, 'apiUrl' => 'apiUrl']],
            'milestone' => [
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
                'htmlUrl'   => 'htmlUrl',
                'apiUrl'    => 'apiUrl',
                'closedAt'  => '2016-08-02T17:35:14+00:00',
                'createdAt' => '2016-08-02T17:35:14+00:00',
                'updatedAt' => '2016-08-02T17:35:14+00:00',
            ],
            'closedAt'  => '2016-08-02T17:35:14+00:00',
            'createdAt' => '2016-08-02T17:35:14+00:00',
            'updatedAt' => '2016-08-02T17:35:14+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubIssue::deserialize(json_decode($serialized, true)));
    }
}
