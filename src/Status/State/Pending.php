<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\StatusState;

class Pending extends StatusState
{
    const NAME = 'pending';

    protected function getName(): string
    {
        return self::NAME;
    }
}
