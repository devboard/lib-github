<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactory;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactory
 * @group  unit
 */
class InstallationRepositorySelectionFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var InstallationRepositorySelectionFactory */
    private $installationRepositorySelectionFactory;

    public function setUp(): void
    {
        $this->installationRepositorySelectionFactory = new InstallationRepositorySelectionFactory();
    }

    public function testCreate(): void
    {
        $this->markTestSkipped('Skipping');
    }
}
