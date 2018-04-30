<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Issue\IssueAssignee;
use DevboardLib\GitHub\Issue\IssueAssigneeCollection;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\Issue\IssueAssigneeCollection
 * @group  unit
 */
class IssueAssigneeCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var IssueAssigneeCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
            new IssueAssignee(
                new AccountId(6752317),
                new AccountLogin('devboard-test'),
                new AccountType('Bot'),
                new AccountAvatarUrl('https://avatars.githubusercontent.com/u/6752317?v=3'),
                new AccountHtmlUrl('https://github.com/baxterthehacker'),
                new AccountApiUrl('https://api.github.com/users/baxterthehacker'),
                false
            ),
        ];
        $this->sut = new IssueAssigneeCollection($this->elements);
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
