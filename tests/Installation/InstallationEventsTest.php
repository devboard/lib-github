<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationEvents;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationEvents
 * @group  unit
 */
class InstallationEventsTest extends TestCase
{
    /** @var array */
    private $values;

    /** @var InstallationEvents */
    private $sut;

    public function setUp(): void
    {
        $this->values = ['some-installation-event', 'another-installation-event'];
        $this->sut    = new InstallationEvents($this->values);
    }

    public function testGetValues(): void
    {
        self::assertSame($this->values, $this->sut->getValues());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->values, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->values));
    }
}
