<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitParent
 * @group  unit
 */
class CommitParentTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var ParentApiUrl */
    private $apiUrl;

    /** @var ParentHtmlUrl */
    private $htmlUrl;

    /** @var CommitParent */
    private $sut;

    public function setUp()
    {
        $this->sha    = new CommitSha('5246f51f550db504e76c98b641e3337570e84dd4');
        $this->apiUrl = new ParentApiUrl(
            'https://api.github.com/repos/symfony/symfony-docs/git/commits/5246f51f550db504e76c98b641e3337570e84dd4'
        );
        $this->htmlUrl = new ParentHtmlUrl(
            'https://github.com/symfony/symfony-docs/commit/5246f51f550db504e76c98b641e3337570e84dd4'
        );
        $this->sut = new CommitParent($this->sha, $this->apiUrl, $this->htmlUrl);
    }

    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }

    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testSerialize()
    {
        $expected = [
            'sha'     => '5246f51f550db504e76c98b641e3337570e84dd4',
            'apiUrl'  => 'https://api.github.com/repos/symfony/symfony-docs/git/commits/5246f51f550db504e76c98b641e3337570e84dd4',
            'htmlUrl' => 'https://github.com/symfony/symfony-docs/commit/5246f51f550db504e76c98b641e3337570e84dd4',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitParent::deserialize(json_decode($serialized, true)));
    }
}
