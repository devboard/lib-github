<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Build\Status;

use DevboardLib\GitHub\Build\BuildStatus;

class Failing extends BuildStatus
{
    const NAME = 'failing';

    protected function getName(): string
    {
        return self::NAME;
    }
}
