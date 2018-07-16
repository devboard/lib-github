<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\StatusCheck;

use DevboardLib\GitHub\StatusCheck\State\Error;
use DevboardLib\GitHub\StatusCheck\State\Failure;
use DevboardLib\GitHub\StatusCheck\State\Pending;
use DevboardLib\GitHub\StatusCheck\State\Success;
use DevboardLib\GitHub\StatusCheck\StatusCheckState;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\StatusCheck\StatusCheckState
 * @group  unit
 */
class StatusCheckStateTest extends TestCase
{
    /**
     * @dataProvider provideValidStates
     */
    public function testCreate(string $name, StatusCheckState $expectedClassInstance): void
    {
        self::assertEquals($expectedClassInstance, StatusCheckState::create($name));
    }

    /**
     * @expectedException \DomainException
     */
    public function testCreateCantBuildUnknownStateObject(): void
    {
        StatusCheckState::create('unknown');
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
