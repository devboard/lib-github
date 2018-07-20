<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociation;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociation
 * @group  unit
 */
class PullRequestReviewAuthorAssociationTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var PullRequestReviewAuthorAssociation */
    private $sut;

    public function setUp(): void
    {
        $this->value = 'COLLABORATOR';
        $this->sut   = new PullRequestReviewAuthorAssociation($this->value);
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
