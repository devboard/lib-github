<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Status\State;

use DevboardLib\GitHub\Status\StatusState;

/**
 * @deprecated Please use StatusCheck version! Remove this in version 2.0
 */
class Success extends StatusState
{
    const NAME = 'success';

    protected function getName(): string
    {
        return self::NAME;
    }
}
