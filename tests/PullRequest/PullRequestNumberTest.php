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

    public function setUp(): void
    {
        $this->value = 1;
        $this->sut   = new PullRequestNumber($this->value);
    }

    public function testGetValue(): void
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame((string) $this->value, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->value));
    }
}
