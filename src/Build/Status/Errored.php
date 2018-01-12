<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\BuildStatus;

class Errored extends BuildStatus
{
    const NAME = 'errored';

    protected function getName(): string
    {
        return self::NAME;
    }
}
