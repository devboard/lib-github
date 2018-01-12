<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoLanguage;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoLanguage
 * @group  unit
 */
class RepoLanguageTest extends TestCase
{
    /** @var string */
    private $language;

    /** @var RepoLanguage */
    private $sut;

    public function setUp()
    {
        $this->language = 'CSS';
        $this->sut      = new RepoLanguage($this->language);
    }

    public function testGetLanguage()
    {
        self::assertSame($this->language, $this->sut->getLanguage());
    }

    public function testGetValue()
    {
        self::assertSame($this->language, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->language, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->language, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->language));
    }
}
