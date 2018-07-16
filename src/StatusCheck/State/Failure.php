<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\StatusCheckState;

class Failure extends StatusCheckState
{
    const NAME = 'failure';

    protected function getName(): string
    {
        return self::NAME;
    }
}
