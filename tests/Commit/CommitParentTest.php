<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitParent;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitParent
 * @group  unit
 */
class CommitParentTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var CommitParent */
    private $sut;

    public function setUp()
    {
        $this->sha = new CommitSha('5246f51f550db504e76c98b641e3337570e84dd4');
        $this->sut = new CommitParent($this->sha);
    }

    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testSerialize()
    {
        $expected = ['sha' => '5246f51f550db504e76c98b641e3337570e84dd4'];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitParent::deserialize(json_decode($serialized, true)));
    }
}
