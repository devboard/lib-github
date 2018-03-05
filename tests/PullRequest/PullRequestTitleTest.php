<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\PullRequest\PullRequestTitle;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestTitle
 * @group  todo
 */
class PullRequestTitleTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var PullRequestTitle */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new PullRequestTitle($this->value);
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