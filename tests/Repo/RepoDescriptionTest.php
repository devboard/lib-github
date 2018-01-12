<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoDescription;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoDescription
 * @group  unit
 */
class RepoDescriptionTest extends TestCase
{
    /** @var string */
    private $description;

    /** @var RepoDescription */
    private $sut;

    public function setUp()
    {
        $this->description = 'Language Savant. If your repository language is being reported incorrectly, send us a pull request!';
        $this->sut         = new RepoDescription($this->description);
    }

    public function testGetDescription()
    {
        self::assertSame($this->description, $this->sut->getDescription());
    }

    public function testGetValue()
    {
        self::assertSame($this->description, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->description, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->description, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->description));
    }
}
