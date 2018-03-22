<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\PullRequest\PullRequestNumber;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestNumber
 * @group  unit
 */
class PullRequestNumberTest extends TestCase
{
    /** @var int */
    private $value;

    /** @var PullRequestNumber */
    private $sut;

    public function setUp()
    {
        $this->value = 1;
        $this->sut   = new PullRequestNumber($this->value);
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
