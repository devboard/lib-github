<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Issue\IssueState;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Issue\IssueState
 * @group  todo
 */
class IssueStateTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var IssueState */
    private $sut;

    public function setUp()
    {
        $this->value = 'open';
        $this->sut   = new IssueState($this->value);
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
