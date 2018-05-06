<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubPullRequest;
use DevboardLib\GitHub\PullRequest\PullRequestAuthor;
use DevboardLib\GitHub\PullRequest\PullRequestAuthorAssociation;
use DevboardLib\GitHub\PullRequest\PullRequestBody;
use DevboardLib\GitHub\PullRequest\PullRequestClosedAt;
use DevboardLib\GitHub\PullRequest\PullRequestCreatedAt;
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
            false
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

                'siteAdmin' => false,
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
