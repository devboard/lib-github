<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\StatusCheckState;

class Error extends StatusCheckState
{
    const NAME = 'error';

    protected function getName(): string
    {
        return self::NAME;
    }
}
