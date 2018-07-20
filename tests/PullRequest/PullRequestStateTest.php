<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\PullRequest;

use DevboardLib\GitHub\PullRequest\PullRequestState;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\PullRequest\PullRequestState
 * @group  unit
 */
class PullRequestStateTest extends TestCase
{
    /**
     * @dataProvider provideStates
     */
    public function testGetValue(string $stateName): void
    {
        $sut = new PullRequestState($stateName);
        self::assertEquals($stateName, $sut->getValue());
    }

    /**
     * @dataProvider provideStates
     */
    public function testToString(string $stateName): void
    {
        $sut = new PullRequestState($stateName);
        self::assertEquals($stateName, $sut->asString());
    }

    public function provideStates(): array
    {
        return [['open'], ['closed']];
    }
}
