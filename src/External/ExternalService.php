<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\External;

use DevboardLib\GitHub\StatusCheck\StatusCheckContext;

abstract class ExternalService
{
    /** @var StatusCheckContext */
    protected $context;

    public function __construct(StatusCheckContext $context)
    {
        $this->context = $context;
    }

    abstract public function getValue(): string;

    public function asString(): string
    {
        return $this->getValue();
    }

    /**
     * @deprecated Please use `asString()`
     */
    public function __toString(): string
    {
        return $this->getValue();
    }

    public function getJobName(): string
    {
        return $this->context->getValue();
    }

    public function getContext(): StatusCheckContext
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

        $context = new StatusCheckContext($data['context']);

        return new $className($context);
    }
}
