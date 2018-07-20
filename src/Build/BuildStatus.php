<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Build;

use DevboardLib\GitHub\Build\Status\Created;
use DevboardLib\GitHub\Build\Status\Errored;
use DevboardLib\GitHub\Build\Status\Failed;
use DevboardLib\GitHub\Build\Status\Failing;
use DevboardLib\GitHub\Build\Status\InProgress;
use DevboardLib\GitHub\Build\Status\Passed;
use DomainException;

abstract class BuildStatus
{
    public function getValue(): string
    {
        return $this->getName();
    }

    public function asString(): string
    {
        return $this->getName();
    }

    /**
     * @deprecated Please use `asString()`
     */
    public function __toString(): string
    {
        return $this->getName();
    }

    public static function create(string $name): self
    {
        if (Created::NAME === $name) {
            return self::Created();
        } elseif (InProgress::NAME === $name) {
            return self::InProgress();
        } elseif (Failing::NAME === $name) {
            return self::Failing();
        } elseif (Failed::NAME === $name) {
            return self::Failed();
        } elseif (Errored::NAME === $name) {
            return self::Errored();
        } elseif (Passed::NAME === $name) {
            return self::Passed();
        }

        throw new DomainException('Unknown GitHub build state:'.$name);
    }

    public static function Created(): Created
    {
        return new Created();
    }

    public static function InProgress(): InProgress
    {
        return new InProgress();
    }

    public static function Failing(): Failing
    {
        return new Failing();
    }

    public static function Failed(): Failed
    {
        return new Failed();
    }

    public static function Errored(): Errored
    {
        return new Errored();
    }

    public static function Passed(): Passed
    {
        return new Passed();
    }

    abstract protected function getName(): string;
}
