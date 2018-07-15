<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactoryException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactoryException
 * @group  unit
 */
class InstallationRepositorySelectionFactoryExceptionTest extends TestCase
{
    /** @var InstallationRepositorySelectionFactoryException */
    private $sut;

    public function setUp(): void
    {
        $this->sut = InstallationRepositorySelectionFactoryException::create('zz');
    }

    public function testGetMessage(): void
    {
        self::assertInstanceOf(InstallationRepositorySelectionFactoryException::class, $this->sut);
        self::assertEquals(
            'Unknown InstallationInstallationRepositorySelection with name: zz', $this->sut->getMessage()
        );
    }
}
