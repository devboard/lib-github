<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\External\Service\CodeCoverage;

use DevboardLib\GitHub\External\ExternalService;

class CodeCovIo extends ExternalService
{
    public function getValue(): string
    {
        return 'CodecovIO';
    }

    public function getJobName(): string
    {
        return str_replace('codecov/', '', $this->getContext()->getValue());
    }
}
