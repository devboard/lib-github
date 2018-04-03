<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\ExternalService;

class CodeClimate extends ExternalService
{
    public function getValue(): string
    {
        return 'CodeClimate';
    }

    public function getJobName(): string
    {
        return '';
    }
}
