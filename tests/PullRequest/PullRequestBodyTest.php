<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\PullRequest\PullRequestBody;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestBody
 * @group  unit
 */
class PullRequestBodyTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var PullRequestBody */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new PullRequestBody($this->value);
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
