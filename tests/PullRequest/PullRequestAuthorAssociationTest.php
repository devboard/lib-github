<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\PullRequest\PullRequestAuthorAssociation;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestAuthorAssociation
 * @group  unit
 */
class PullRequestAuthorAssociationTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var PullRequestAuthorAssociation */
    private $sut;

    public function setUp(): void
    {
        $this->value = 'COLLABORATOR';
        $this->sut   = new PullRequestAuthorAssociation($this->value);
    }

    public function testGetValue(): void
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->value, $this->sut->__toString());
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
