<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use PHPUnit\Framework\TestCase;

abstract class StatsTest extends TestCase
{
    abstract public static function createSut(int $value);

    /** @dataProvider provideValues */
    public function testItExposesValue(int $value)
    {
        $sut = static::createSut($value);
        self::assertEquals($value, $sut->getValue());
    }

    /** @dataProvider provideValues */
    public function testItCanBeAutoConvertedToString(int $value)
    {
        $sut = static::createSut($value);
        self::assertEquals((string) $value, (string) $sut);
    }

    public function provideValues()
    {
        return [[0], [1]];
    }
}
