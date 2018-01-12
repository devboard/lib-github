<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\BuildStatus;

class Passed extends BuildStatus
{
    const NAME = 'passed';

    protected function getName(): string
    {
        return self::NAME;
    }
}
