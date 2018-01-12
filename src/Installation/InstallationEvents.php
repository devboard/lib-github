<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see \spec\DevboardLib\GitHub\Installation\InstallationEventsSpec
 * @see \Tests\DevboardLib\GitHub\Installation\InstallationEventsTest
 */
class InstallationEvents
{
    /** @var array */
    private $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function serialize(): array
    {
        return $this->values;
    }

    public static function deserialize(array $values): self
    {
        return new self($values);
    }
}
