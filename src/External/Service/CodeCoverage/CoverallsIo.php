<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\External\Service\CodeCoverage;

use DevboardLib\GitHub\External\ExternalService;

class CoverallsIo extends ExternalService
{
    public function getValue(): string
    {
        return 'Coveralls.io';
    }
}
