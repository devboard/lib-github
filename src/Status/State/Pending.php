<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\StatusState;

/**
 * @deprecated Please use StatusCheck version! Remove this in version 2.0
 */
class Pending extends StatusState
{
    const NAME = 'pending';

    protected function getName(): string
    {
        return self::NAME;
    }
}
