<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\StatusCheckState;

class Pending extends StatusCheckState
{
    const NAME = 'pending';

    protected function getName(): string
    {
        return self::NAME;
    }
}
