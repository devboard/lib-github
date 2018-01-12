<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

use DateTime;

/**
 * @see \spec\DevboardLib\GitHub\Installation\InstallationCreatedAtSpec
 * @see \Tests\DevboardLib\GitHub\Installation\InstallationCreatedAtTest
 */
class InstallationCreatedAt extends DateTime
{
    public static function createFromFormat($format, $time, $object = null): self
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }

    public function __toString(): string
    {
        return $this->format('c');
    }

    public function serialize(): string
    {
        return $this->__toString();
    }

    public static function deserialize($value): self
    {
        return new self($value);
    }
}
