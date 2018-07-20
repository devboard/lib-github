<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewState;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequestReview\PullRequestReviewState
 * @group  unit
 */
class PullRequestReviewStateTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var PullRequestReviewState */
    private $sut;

    public function setUp(): void
    {
        $this->value = 'approved';
        $this->sut   = new PullRequestReviewState($this->value);
    }

    public function testGetValue(): void
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->value, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->value));
    }
}
