<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubLabel;
use DevboardLib\GitHub\Label\LabelApiUrl;
use DevboardLib\GitHub\Label\LabelColor;
use DevboardLib\GitHub\Label\LabelId;
use DevboardLib\GitHub\Label\LabelName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\GitHubLabel
 * @group  todo
 */
class GitHubLabelTest extends TestCase
{
    /** @var LabelId */
    private $id;

    /** @var LabelName */
    private $name;

    /** @var LabelColor */
    private $color;

    /** @var bool */
    private $default;

    /** @var LabelApiUrl */
    private $apiUrl;

    /** @var GitHubLabel */
    private $sut;

    public function setUp()
    {
        $this->id      = new LabelId(1);
        $this->name    = new LabelName('value');
        $this->color   = new LabelColor('color');
        $this->default = true;
        $this->apiUrl  = new LabelApiUrl('apiUrl');
        $this->sut     = new GitHubLabel($this->id, $this->name, $this->color, $this->default, $this->apiUrl);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetColor()
    {
        self::assertSame($this->color, $this->sut->getColor());
    }

    public function testIsDefault()
    {
        self::assertSame($this->default, $this->sut->isDefault());
    }

    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }

    public function testSerialize()
    {
        $expected = [
            'id'      => 1,
            'name'    => 'value',
            'color'   => 'color',
            'default' => true,
            'apiUrl'  => 'apiUrl',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubLabel::deserialize(json_decode($serialized, true)));
    }
}
