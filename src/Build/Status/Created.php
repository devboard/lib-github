<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\BuildStatus;

class Created extends BuildStatus
{
    const NAME = 'created';

    protected function getName(): string
    {
        return self::NAME;
    }
}
