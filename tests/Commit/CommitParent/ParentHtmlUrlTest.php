<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\CommitParent;

use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl
 * @group  unit
 */
class ParentHtmlUrlTest extends TestCase
{
    /** @var string */
    private $htmlUrl;

    /** @var ParentHtmlUrl */
    private $sut;

    public function setUp()
    {
        $this->htmlUrl = 'https://github.com/baxterandthehackers/new-repository';
        $this->sut     = new ParentHtmlUrl($this->htmlUrl);
    }

    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->htmlUrl, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->htmlUrl, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->htmlUrl, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->htmlUrl));
    }
}
