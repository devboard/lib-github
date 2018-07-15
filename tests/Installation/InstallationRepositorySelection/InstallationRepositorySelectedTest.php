<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation\InstallationRepositorySelection;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected
 * @group  unit
 */
class InstallationRepositorySelectedTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var InstallationRepositorySelected */
    private $installationRepositorySelected;

    public function setUp(): void
    {
        $this->installationRepositorySelected = new InstallationRepositorySelected();
    }

    public function testSelectedOnly(): void
    {
        self::markTestSkipped('Skipping');
    }

    public function testAll(): void
    {
        self::markTestSkipped('Skipping');
    }

    public function testGetValue(): void
    {
        self::markTestSkipped('Skipping');
    }

    public function testToString(): void
    {
        self::markTestSkipped('Skipping');
    }
}
