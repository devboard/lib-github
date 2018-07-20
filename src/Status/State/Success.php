<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\StatusState;

class Success extends StatusState
{
    const NAME = 'success';

    protected function getName(): string
    {
        return self::NAME;
    }
}
