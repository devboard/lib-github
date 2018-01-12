<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\BuildStatus;

class Failed extends BuildStatus
{
    const NAME = 'failed';

    protected function getName(): string
    {
        return self::NAME;
    }
}
