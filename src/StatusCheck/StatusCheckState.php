<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\StatusCheck;

use DevboardLib\GitHub\StatusCheck\State\Error;
use DevboardLib\GitHub\StatusCheck\State\Failure;
use DevboardLib\GitHub\StatusCheck\State\Pending;
use DevboardLib\GitHub\StatusCheck\State\Success;
use DomainException;

/**
 * @see StatusCheckStateTest
 */
abstract class StatusCheckState
{
    public function getValue(): string
    {
        return $this->getName();
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public static function create(string $name): self
    {
        if (Pending::NAME === $name) {
            return self::Pending();
        } elseif (Error::NAME === $name) {
            return self::Error();
        } elseif (Failure::NAME === $name) {
            return self::Failure();
        } elseif (Success::NAME === $name) {
            return self::Success();
        }

        throw new DomainException('Unknown external state:'.$name);
    }

    public static function Pending(): Pending
    {
        return new Pending();
    }

    public static function Error(): Error
    {
        return new Error();
    }

    public static function Failure(): Failure
    {
        return new Failure();
    }

    public static function Success(): Success
    {
        return new Success();
    }

    abstract protected function getName(): string;

    public function serialize(): string
    {
        return $this->getName();
    }

    public static function deserialize(string $value): self
    {
        return self::create($value);
    }
}