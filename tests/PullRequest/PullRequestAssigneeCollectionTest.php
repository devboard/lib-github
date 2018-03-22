<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\PullRequest\PullRequestAssignee;
use DevboardLib\GitHub\PullRequest\PullRequestAssigneeCollection;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestAssigneeCollection
 * @group  unit
 */
class PullRequestAssigneeCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var PullRequestAssigneeCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
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
        ];
        $this->sut = new PullRequestAssigneeCollection($this->elements);
    }

    public function testGetElements()
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize()
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
