<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequestReview;

use DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociation;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequestReview\PullRequestReviewAuthorAssociation
 * @group  todo
 */
class PullRequestReviewAuthorAssociationTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var PullRequestReviewAuthorAssociation */
    private $sut;

    public function setUp()
    {
        $this->value = 'COLLABORATOR';
        $this->sut   = new PullRequestReviewAuthorAssociation($this->value);
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
