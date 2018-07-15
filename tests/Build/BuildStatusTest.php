<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Build;

use DevboardLib\GitHub\Build\BuildStatus;
use DevboardLib\GitHub\Build\Status\Created;
use DevboardLib\GitHub\Build\Status\Errored;
use DevboardLib\GitHub\Build\Status\Failed;
use DevboardLib\GitHub\Build\Status\Failing;
use DevboardLib\GitHub\Build\Status\InProgress;
use DevboardLib\GitHub\Build\Status\Passed;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Build\BuildStatus
 * @group  unit
 */
class BuildStatusTest extends TestCase
{
    /**
     * @dataProvider provideValidStatuses
     */
    public function testCreate(string $name, BuildStatus $expectedClassInstance): void
    {
        self::assertEquals($expectedClassInstance, BuildStatus::create($name));
    }

    /**
     * @expectedException \DomainException
     */
    public function testCreateCantBuildUnknownStatusObject(): void
    {
        BuildStatus::create('unknown');
    }

    public function provideValidStatuses(): array
    {
        return [
            ['created', new Created()],
            ['errored', new Errored()],
            ['failed', new Failed()],
            ['failing', new Failing()],
            ['in_progress', new InProgress()],
            ['passed', new Passed()],
        ];
    }
}
