<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Status;

use DevboardLib\GitHub\Status\State\Error;
use DevboardLib\GitHub\Status\State\Failure;
use DevboardLib\GitHub\Status\State\Pending;
use DevboardLib\GitHub\Status\State\Success;
use DevboardLib\GitHub\Status\StatusState;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Status\StatusState
 * @group  unit
 */
class StatusStateTest extends TestCase
{
    /**
     * @dataProvider provideValidStates
     */
    public function testCreate(string $name, StatusState $expectedClassInstance)
    {
        self::assertEquals($expectedClassInstance, StatusState::create($name));
    }

    /**
     * @expectedException \DomainException
     */
    public function testCreateCantBuildUnknownStateObject()
    {
        StatusState::create('unknown');
    }

    public function provideValidStates(): array
    {
        return [
            ['pending', new Pending()],
            ['error', new Error()],
            ['failure', new Failure()],
            ['success', new Success()],
        ];
    }
}
