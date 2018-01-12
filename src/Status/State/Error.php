<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\StatusState;

class Error extends StatusState
{
    const NAME = 'error';

    protected function getName(): string
    {
        return self::NAME;
    }
}
