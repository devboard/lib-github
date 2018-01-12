<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation\InstallationRepositorySelection;

use DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected
 * @group  todo
 */
class InstallationRepositorySelectedTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var InstallationRepositorySelected */
    private $installationRepositorySelected;

    public function setUp()
    {
        $this->installationRepositorySelected = new InstallationRepositorySelected();
    }

    public function testSelectedOnly()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAll()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetValue()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testToString()
    {
        $this->markTestSkipped('Skipping');
    }
}
