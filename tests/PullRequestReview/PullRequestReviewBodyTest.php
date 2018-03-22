<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewBody;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequestReview\PullRequestReviewBody
 * @group  unit
 */
class PullRequestReviewBodyTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var PullRequestReviewBody */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new PullRequestReviewBody($this->value);
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
