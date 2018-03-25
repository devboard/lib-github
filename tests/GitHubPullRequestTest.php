<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubLabel;
use DevboardLib\GitHub\GitHubLabelCollection;
use DevboardLib\GitHub\GitHubMilestone;
use DevboardLib\GitHub\GitHubPullRequest;
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
use DevboardLib\GitHub\PullRequest\PullRequestApiUrl;
use DevboardLib\GitHub\PullRequest\PullRequestAssignee;
use DevboardLib\GitHub\PullRequest\PullRequestAssigneeCollection;
use DevboardLib\GitHub\PullRequest\PullRequestAuthor;
use DevboardLib\GitHub\PullRequest\PullRequestAuthorAssociation;
use DevboardLib\GitHub\PullRequest\PullRequestBody;
use DevboardLib\GitHub\PullRequest\PullRequestClosedAt;
use DevboardLib\GitHub\PullRequest\PullRequestCreatedAt;
use DevboardLib\GitHub\PullRequest\PullRequestHtmlUrl;
use DevboardLib\GitHub\PullRequest\PullRequestId;
use DevboardLib\GitHub\PullRequest\PullRequestNumber;
use DevboardLib\GitHub\PullRequest\PullRequestState;
use DevboardLib\GitHub\PullRequest\PullRequestTitle;
use DevboardLib\GitHub\PullRequest\PullRequestUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubPullRequest
 * @group  unit
 */
class GitHubPullRequestTest extends TestCase
{
    /** @var PullRequestId */
    private $id;

    /** @var PullRequestNumber */
    private $number;

    /** @var PullRequestTitle */
    private $title;

    /** @var PullRequestBody */
    private $body;

    /** @var PullRequestState */
    private $state;

    /** @var PullRequestAuthor */
    private $author;

    /** @var PullRequestApiUrl */
    private $apiUrl;

    /** @var PullRequestHtmlUrl */
    private $htmlUrl;

    /** @var PullRequestAssignee|null */
    private $assignee;

    /** @var PullRequestAssigneeCollection */
    private $assignees;

    /** @var GitHubLabelCollection */
    private $labels;

    /** @var GitHubMilestone|null */
    private $milestone;

    /** @var PullRequestClosedAt|null */
    private $closedAt;

    /** @var PullRequestCreatedAt */
    private $createdAt;

    /** @var PullRequestUpdatedAt */
    private $updatedAt;

    /** @var GitHubPullRequest */
    private $sut;

    public function setUp()
    {
        $this->id     = new PullRequestId(1);
        $this->number = new PullRequestNumber(1);
        $this->title  = new PullRequestTitle('value');
        $this->body   = new PullRequestBody('value');
        $this->state  = new PullRequestState('closed');
        $this->author = new PullRequestAuthor(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            PullRequestAuthorAssociation::NONE(),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            new GravatarId('205e460b479e2e5b48aec07710c08d50'),
            new AccountHtmlUrl('https://github.com/baxterthehacker'),
            new AccountApiUrl('https://api.github.com/users/baxterthehacker'),
            false
        );
        $this->apiUrl   = new PullRequestApiUrl('apiUrl');
        $this->htmlUrl  = new PullRequestHtmlUrl('htmlUrl');
        $this->assignee = new PullRequestAssignee(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            new GravatarId('205e460b479e2e5b48aec07710c08d50'),
            new AccountHtmlUrl('https://github.com/baxterthehacker'),
            new AccountApiUrl('https://api.github.com/users/baxterthehacker'),
            false
        );
        $this->assignees = new PullRequestAssigneeCollection(
            [
                new PullRequestAssignee(
                    new AccountId(6752317),
                    new AccountLogin('devboard-test'),
                    new AccountType('Bot'),
                    new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
                    new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                    new AccountHtmlUrl('https://github.com/baxterthehacker'),
                    new AccountApiUrl('https://api.github.com/users/baxterthehacker'),
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
                new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                new AccountHtmlUrl('https://github.com/baxterthehacker'),
                new AccountApiUrl('https://api.github.com/users/baxterthehacker'),
                false
            ),
            new MilestoneHtmlUrl('htmlUrl'),
            new MilestoneApiUrl('apiUrl'),
            new MilestoneClosedAt('2016-08-02T17:35:14+00:00'),
            new MilestoneCreatedAt('2016-08-02T17:35:14+00:00'),
            new MilestoneUpdatedAt('2016-08-02T17:35:14+00:00')
        );
        $this->closedAt  = new PullRequestClosedAt('2016-08-02T17:35:14+00:00');
        $this->createdAt = new PullRequestCreatedAt('2016-08-02T17:35:14+00:00');
        $this->updatedAt = new PullRequestUpdatedAt('2016-08-02T17:35:14+00:00');
        $this->sut       = new GitHubPullRequest(
            $this->id,
            $this->number,
            $this->title,
            $this->body,
            $this->state,
            $this->author,
            $this->apiUrl,
            $this->htmlUrl,
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

    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }

    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
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
                'userId'      => 6752317,
                'login'       => 'devboard-test',
                'type'        => 'Bot',
                'association' => 'NONE',
                'avatarUrl'   => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'gravatarId'  => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'     => 'https://github.com/baxterthehacker',
                'apiUrl'      => 'https://api.github.com/users/baxterthehacker',
                'siteAdmin'   => false,
            ],
            'apiUrl'   => 'apiUrl',
            'htmlUrl'  => 'htmlUrl',
            'assignee' => [
                'userId'     => 6752317,
                'login'      => 'devboard-test',
                'type'       => 'Bot',
                'avatarUrl'  => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'https://github.com/baxterthehacker',
                'apiUrl'     => 'https://api.github.com/users/baxterthehacker',
                'siteAdmin'  => false,
            ],
            'assignees' => [
                [
                    'userId'     => 6752317,
                    'login'      => 'devboard-test',
                    'type'       => 'Bot',
                    'avatarUrl'  => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'https://github.com/baxterthehacker',
                    'apiUrl'     => 'https://api.github.com/users/baxterthehacker',
                    'siteAdmin'  => false,
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
                    'userId'     => 6752317,
                    'login'      => 'devboard-test',
                    'type'       => 'Bot',
                    'avatarUrl'  => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'https://github.com/baxterthehacker',
                    'apiUrl'     => 'https://api.github.com/users/baxterthehacker',
                    'siteAdmin'  => false,
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
        self::assertEquals($this->sut, GitHubPullRequest::deserialize(json_decode($serialized, true)));
    }
}
