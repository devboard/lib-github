<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoParent;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoParent
 * @group  unit
 */
class RepoParentTest extends TestCase
{
    /** @var RepoId */
    private $id;

    /** @var RepoFullName */
    private $fullName;

    /** @var RepoParent */
    private $sut;

    public function setUp(): void
    {
        $this->id       = new RepoId(1296269);
        $this->fullName = new RepoFullName(new AccountLogin('devboard-test'), new RepoName('Hello-World'));
        $this->sut      = new RepoParent($this->id, $this->fullName);
    }

    public function testGetId(): void
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetFullName(): void
    {
        self::assertSame($this->fullName, $this->sut->getFullName());
    }

    public function testSerialize(): void
    {
        $expected = ['id' => 1296269, 'fullName' => ['owner' => 'devboard-test', 'repoName' => 'Hello-World']];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoParent::deserialize(json_decode($serialized, true)));
    }
}
