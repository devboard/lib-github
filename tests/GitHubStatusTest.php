<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DateTime;
use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\External\Service\ContinuousIntegration\CircleCi;
use DevboardLib\GitHub\GitHubStatus;
use DevboardLib\GitHub\Status\StatusContext;
use DevboardLib\GitHub\Status\StatusCreator;
use DevboardLib\GitHub\Status\StatusDescription;
use DevboardLib\GitHub\Status\StatusId;
use DevboardLib\GitHub\Status\StatusState;
use DevboardLib\GitHub\Status\StatusTargetUrl;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubStatus
 * @group  unit
 */
class GitHubStatusTest extends TestCase
{
    /** @var StatusId */
    private $id;

    /** @var StatusState */
    private $state;

    /** @var StatusDescription */
    private $description;

    /** @var StatusTargetUrl */
    private $targetUrl;

    /** @var StatusContext */
    private $context;

    /** @var ExternalService */
    private $externalService;

    /** @var StatusCreator */
    private $creator;

    /** @var DateTime */
    private $createdAt;

    /** @var DateTime */
    private $updatedAt;

    /** @var GitHubStatus */
    private $sut;

    public function setUp()
    {
        $this->id              = new StatusId(1);
        $this->state           = StatusState::Pending();
        $this->description     = new StatusDescription('value');
        $this->targetUrl       = new StatusTargetUrl('https://circleci.com/gh/msvrtan/generator/231');
        $this->context         = new StatusContext('ci/circleci');
        $this->externalService = new CircleCi($this->context);
        $this->creator         = new StatusCreator(
            new AccountId(6752317),
            new AccountLogin('devboard-test'),
            new AccountType('Bot'),
            new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
            new GravatarId('205e460b479e2e5b48aec07710c08d50'),
            new AccountHtmlUrl('https://github.com/baxterthehacker'),
            new AccountApiUrl('https://api.github.com/users/baxterthehacker'),
            false
        );
        $this->createdAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->updatedAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut       = new GitHubStatus(
            $this->id,
            $this->state,
            $this->description,
            $this->targetUrl,
            $this->context,
            $this->externalService,
            $this->creator,
            $this->createdAt,
            $this->updatedAt
        );
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetState()
    {
        self::assertSame($this->state, $this->sut->getState());
    }

    public function testGetDescription()
    {
        self::assertSame($this->description, $this->sut->getDescription());
    }

    public function testGetTargetUrl()
    {
        self::assertSame($this->targetUrl, $this->sut->getTargetUrl());
    }

    public function testGetContext()
    {
        self::assertSame($this->context, $this->sut->getContext());
    }

    public function testGetExternalService()
    {
        self::assertSame($this->externalService, $this->sut->getExternalService());
    }

    public function testGetCreator()
    {
        self::assertSame($this->creator, $this->sut->getCreator());
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
            'id'              => 1,
            'state'           => 'pending',
            'description'     => 'value',
            'targetUrl'       => 'https://circleci.com/gh/msvrtan/generator/231',
            'context'         => 'ci/circleci',
            'externalService' => [
                'context'   => 'ci/circleci',
                'className' => 'DevboardLib\GitHub\External\Service\ContinuousIntegration\CircleCi',
            ],
            'creator' => [
                'userId'     => 6752317,
                'login'      => 'devboard-test',
                'type'       => 'Bot',
                'avatarUrl'  => 'https://avatars.githubusercontent.com/u/6752317?v=3',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'https://github.com/baxterthehacker',
                'apiUrl'     => 'https://api.github.com/users/baxterthehacker',
                'siteAdmin'  => false,
            ],
            'createdAt' => '2018-01-01T00:01:00+00:00',
            'updatedAt' => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubStatus::deserialize(json_decode($serialized, true)));
    }
}
