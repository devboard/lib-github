<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Issue;

use DevboardLib\GitHub\Issue\IssueBody;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Issue\IssueBody
 * @group  todo
 */
class IssueBodyTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var IssueBody */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new IssueBody($this->value);
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
