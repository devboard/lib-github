<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\External\Service\ContinuousIntegration;

use DevboardLib\GitHub\External\ExternalService;

class StyleCi extends ExternalService
{
    public function getValue(): string
    {
        return 'StyleCI';
    }

    public function getJobName(): string
    {
        return '';
    }
}
