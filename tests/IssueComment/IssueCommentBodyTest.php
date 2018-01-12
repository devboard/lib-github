<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\IssueComment;

use DevboardLib\GitHub\IssueComment\IssueCommentBody;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\IssueComment\IssueCommentBody
 * @group  todo
 */
class IssueCommentBodyTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var IssueCommentBody */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new IssueCommentBody($this->value);
    }

    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->value, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->value));
    }
}
