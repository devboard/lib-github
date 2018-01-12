<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Issue\IssueNumber;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Issue\IssueNumber
 * @group  todo
 */
class IssueNumberTest extends TestCase
{
    /** @var int */
    private $value;

    /** @var IssueNumber */
    private $sut;

    public function setUp()
    {
        $this->value = 1;
        $this->sut   = new IssueNumber($this->value);
    }

    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame((string) $this->value, $this->sut->__toString());
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
