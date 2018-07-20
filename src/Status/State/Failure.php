<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\StatusState;

/**
 */
class Failure extends StatusState
{
    const NAME = 'failure';

    protected function getName(): string
    {
        return self::NAME;
    }
}
