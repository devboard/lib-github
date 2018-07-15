<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubLabel;
use DevboardLib\GitHub\GitHubLabelCollection;
use DevboardLib\GitHub\Label\LabelColor;
use DevboardLib\GitHub\Label\LabelId;
use DevboardLib\GitHub\Label\LabelName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\GitHubLabelCollection
 * @group  unit
 */
class GitHubLabelCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var GitHubLabelCollection */
    private $sut;

    public function setUp(): void
    {
        $this->elements = [new GitHubLabel(new LabelId(1), new LabelName('value'), new LabelColor('color'), true)];
        $this->sut      = new GitHubLabelCollection($this->elements);
    }

    public function testGetElements(): void
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize(): void
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
