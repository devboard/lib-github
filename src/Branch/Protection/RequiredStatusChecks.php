<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Branch\Protection;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Contexts;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;

/**
 * @see \spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecksSpec
 * @see \Tests\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecksTest
 */
class RequiredStatusChecks
{
    /** @var RequiredStatusChecksEnforcementLevel */
    private $enforcementLevel;

    /** @var Contexts */
    private $contexts;

    public function __construct(RequiredStatusChecksEnforcementLevel $enforcementLevel, Contexts $contexts)
    {
        $this->enforcementLevel = $enforcementLevel;
        $this->contexts         = $contexts;
    }

    public function getEnforcementLevel(): RequiredStatusChecksEnforcementLevel
    {
        return $this->enforcementLevel;
    }

    public function getContexts(): Contexts
    {
        return $this->contexts;
    }

    public function serialize(): array
    {
        return [
            'enforcementLevel' => $this->enforcementLevel->serialize(),
            'contexts'         => $this->contexts->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            RequiredStatusChecksEnforcementLevel::deserialize($data['enforcementLevel']),
            Contexts::deserialize($data['contexts'])
        );
    }
}
