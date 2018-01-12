<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DateTime;
use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\Status\StatusContext;
use DevboardLib\GitHub\Status\StatusCreator;
use DevboardLib\GitHub\Status\StatusDescription;
use DevboardLib\GitHub\Status\StatusId;
use DevboardLib\GitHub\Status\StatusState;
use DevboardLib\GitHub\Status\StatusTargetUrl;

/**
 * @see \spec\DevboardLib\GitHub\GitHubStatusSpec
 * @see \Tests\DevboardLib\GitHub\GitHubStatusTest
 */
class GitHubStatus
{
    /** @var StatusId */
    private $id;

    /** @var StatusState */
    private $state;

    /** @var StatusDescription */
    private $description;

    /** @var StatusTargetUrl */
    private $targetUrl;

    /** @var StatusContext */
    private $context;

    /** @var ExternalService */
    private $externalService;

    /** @var StatusCreator */
    private $creator;

    /** @var DateTime */
    private $createdAt;

    /** @var DateTime */
    private $updatedAt;

    public function __construct(
        StatusId $id,
        StatusState $state,
        StatusDescription $description,
        StatusTargetUrl $targetUrl,
        StatusContext $context,
        ExternalService $externalService,
        StatusCreator $creator,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $this->id              = $id;
        $this->state           = $state;
        $this->description     = $description;
        $this->targetUrl       = $targetUrl;
        $this->context         = $context;
        $this->externalService = $externalService;
        $this->creator         = $creator;
        $this->createdAt       = $createdAt;
        $this->updatedAt       = $updatedAt;
    }

    public function getId(): StatusId
    {
        return $this->id;
    }

    public function getState(): StatusState
    {
        return $this->state;
    }

    public function getDescription(): StatusDescription
    {
        return $this->description;
    }

    public function getTargetUrl(): StatusTargetUrl
    {
        return $this->targetUrl;
    }

    public function getContext(): StatusContext
    {
        return $this->context;
    }

    public function getExternalService(): ExternalService
    {
        return $this->externalService;
    }

    public function getCreator(): StatusCreator
    {
        return $this->creator;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function serialize(): array
    {
        return [
            'id'              => $this->id->serialize(),
            'state'           => $this->state->serialize(),
            'description'     => $this->description->serialize(),
            'targetUrl'       => $this->targetUrl->serialize(),
            'context'         => $this->context->serialize(),
            'externalService' => $this->externalService->serialize(),
            'creator'         => $this->creator->serialize(),
            'createdAt'       => $this->createdAt->format('c'),
            'updatedAt'       => $this->updatedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            StatusId::deserialize($data['id']),
            StatusState::deserialize($data['state']),
            StatusDescription::deserialize($data['description']),
            StatusTargetUrl::deserialize($data['targetUrl']),
            StatusContext::deserialize($data['context']),
            ExternalService::deserialize($data['externalService']),
            StatusCreator::deserialize($data['creator']),
            new DateTime($data['createdAt']),
            new DateTime($data['updatedAt'])
        );
    }
}
