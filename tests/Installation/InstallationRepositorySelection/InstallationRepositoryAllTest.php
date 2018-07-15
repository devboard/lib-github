<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation\InstallationRepositorySelection;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositoryAll;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositoryAll
 * @group  unit
 */
class InstallationRepositoryAllTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var InstallationRepositoryAll */
    private $installationRepositoryAll;

    public function setUp(): void
    {
        $this->installationRepositoryAll = new InstallationRepositoryAll();
    }

    public function testAll(): void
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSelectedOnly(): void
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetValue(): void
    {
        $this->markTestSkipped('Skipping');
    }

    public function testToString(): void
    {
        $this->markTestSkipped('Skipping');
    }
}
