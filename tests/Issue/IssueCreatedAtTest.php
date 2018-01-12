<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Issue;

use DateTime;
use DevboardLib\GitHub\Issue\IssueCreatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Issue\IssueCreatedAt
 * @group  todo
 */
class IssueCreatedAtTest extends TestCase
{
    /** @var IssueCreatedAt */
    private $sut;

    public function setUp()
    {
        $this->sut = new IssueCreatedAt('2018-01-01T11:22:33+00:00');
    }

    public function testCreateFromFormat()
    {
        $result = $this->sut::createFromFormat(DateTime::ATOM, '2018-01-01T11:22:33Z');
        self::assertEquals('2018-01-01T11:22:33+00:00', $result->__toString());
    }

    public function testToString()
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize('2018-01-01T11:22:33+00:00'));
    }
}
