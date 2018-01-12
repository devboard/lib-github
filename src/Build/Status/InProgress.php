<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\BuildStatus;

class InProgress extends BuildStatus
{
    const NAME = 'in_progress';

    protected function getName(): string
    {
        return self::NAME;
    }
}
