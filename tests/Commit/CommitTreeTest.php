<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitTree;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitTree
 * @group  unit
 */
class CommitTreeTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var CommitTree */
    private $sut;

    public function setUp(): void
    {
        $this->sha = new CommitSha('02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
        $this->sut = new CommitTree($this->sha);
    }

    public function testGetSha(): void
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testSerialize(): void
    {
        $expected = ['sha' => '02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0'];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitTree::deserialize(json_decode($serialized, true)));
    }
}
