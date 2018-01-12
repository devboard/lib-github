<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\External\Service;

use DevboardLib\GitHub\External\ExternalService;

class UnknownService extends ExternalService
{
    public function getValue(): string
    {
        return $this->context->getValue();
    }
}
