<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubIssueComment;
use DevboardLib\GitHub\Issue\IssueApiUrl;
use DevboardLib\GitHub\Issue\IssueId;
use DevboardLib\GitHub\IssueComment\IssueCommentApiUrl;
use DevboardLib\GitHub\IssueComment\IssueCommentAuthor;
use DevboardLib\GitHub\IssueComment\IssueCommentBody;
use DevboardLib\GitHub\IssueComment\IssueCommentCreatedAt;
use DevboardLib\GitHub\IssueComment\IssueCommentHtmlUrl;
use DevboardLib\GitHub\IssueComment\IssueCommentId;
use DevboardLib\GitHub\IssueComment\IssueCommentUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubIssueComment
 * @group  unit
 */
class GitHubIssueCommentTest extends TestCase
{
    /** @var IssueCommentId */
    private $id;

    /** @var IssueId */
    private $issueId;

    /** @var IssueCommentBody */
    private $body;

    /** @var IssueCommentAuthor */
    private $author;

    /** @var IssueCommentHtmlUrl */
    private $htmlUrl;

    /** @var IssueCommentApiUrl */
    private $apiUrl;

    /** @var IssueApiUrl */
    private $issueApiUrl;

    /** @var IssueCommentCreatedAt */
    private $createdAt;

    /** @var IssueCommentUpdatedAt */
    private $updatedAt;

    /** @var GitHubIssueComment */
    private $sut;

    public function setUp()
    {
        $this->id      = new IssueCommentId(1);
        $this->issueId = new IssueId(1);
        $this->body    = new IssueCommentBody('value');
        $this->author  = new IssueCommentAuthor(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            false
        );
        $this->htmlUrl     = new IssueCommentHtmlUrl('htmlUrl');
        $this->apiUrl      = new IssueCommentApiUrl('apiUrl');
        $this->issueApiUrl = new IssueApiUrl('apiUrl');
        $this->createdAt   = new IssueCommentCreatedAt('2016-08-02T17:35:14+00:00');
        $this->updatedAt   = new IssueCommentUpdatedAt('2016-08-02T17:35:14+00:00');
        $this->sut         = new GitHubIssueComment(
            $this->id,
            $this->issueId,
            $this->body,
            $this->author,
            $this->htmlUrl,
            $this->apiUrl,
            $this->issueApiUrl,
            $this->createdAt,
            $this->updatedAt
        );
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetIssueId()
    {
        self::assertSame($this->issueId, $this->sut->getIssueId());
    }

    public function testGetBody()
    {
        self::assertSame($this->body, $this->sut->getBody());
    }

    public function testGetAuthor()
    {
        self::assertSame($this->author, $this->sut->getAuthor());
    }

    public function testGetIssueApiUrl()
    {
        self::assertSame($this->issueApiUrl, $this->sut->getIssueApiUrl());
    }

    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'id'      => 1,
            'issueId' => 1,
            'body'    => 'value',
            'author'  => [
                'userId'    => 6752317,
                'login'     => 'devboard-test',
                'type'      => 'Bot',
                'avatarUrl' => 'https://avatars.githubusercontent.com/u/6752317?v=3',

                'siteAdmin' => false,
            ],
            'htmlUrl'     => 'htmlUrl',
            'apiUrl'      => 'apiUrl',
            'issueApiUrl' => 'apiUrl',
            'createdAt'   => '2016-08-02T17:35:14+00:00',
            'updatedAt'   => '2016-08-02T17:35:14+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubIssueComment::deserialize(json_decode($serialized, true)));
    }
}
