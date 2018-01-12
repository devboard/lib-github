<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\External;

use DevboardLib\GitHub\Status\StatusContext;

abstract class ExternalService
{
    /** @var StatusContext */
    protected $context;

    public function __construct(StatusContext $context)
    {
        $this->context = $context;
    }

    abstract public function getValue(): string;

    public function __toString(): string
    {
        return $this->getValue();
    }

    public function getContext(): StatusContext
    {
        return $this->context;
    }

    public function serialize(): array
    {
        return ['context' => $this->context->getValue(), 'className' => get_class($this)];
    }

    public static function deserialize(array $data): self
    {
        $className = $data['className'];

        $context = new StatusContext($data['context']);

        return new $className($context);
    }
}
