<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\StatusCheck\State;

use DevboardLib\GitHub\StatusCheck\StatusCheckState;

class Success extends StatusCheckState
{
    const NAME = 'success';

    protected function getName(): string
    {
        return self::NAME;
    }
}
