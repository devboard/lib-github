<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Milestone\MilestoneApiUrl;
use DevboardLib\GitHub\Milestone\MilestoneClosedAt;
use DevboardLib\GitHub\Milestone\MilestoneCreatedAt;
use DevboardLib\GitHub\Milestone\MilestoneCreator;
use DevboardLib\GitHub\Milestone\MilestoneDescription;
use DevboardLib\GitHub\Milestone\MilestoneDueOn;
use DevboardLib\GitHub\Milestone\MilestoneHtmlUrl;
use DevboardLib\GitHub\Milestone\MilestoneId;
use DevboardLib\GitHub\Milestone\MilestoneNumber;
use DevboardLib\GitHub\Milestone\MilestoneState;
use DevboardLib\GitHub\Milestone\MilestoneTitle;
use DevboardLib\GitHub\Milestone\MilestoneUpdatedAt;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 *
 * @see \spec\DevboardLib\GitHub\GitHubMilestoneSpec
 * @see \Tests\DevboardLib\GitHub\GitHubMilestoneTest
 */
class GitHubMilestone
{
    /** @var MilestoneId */
    private $id;

    /** @var MilestoneTitle */
    private $title;

    /** @var MilestoneDescription */
    private $description;

    /** @var MilestoneDueOn|null */
    private $dueOn;

    /** @var MilestoneState */
    private $state;

    /** @var MilestoneNumber */
    private $number;

    /** @var MilestoneCreator */
    private $creator;

    /** @var MilestoneHtmlUrl */
    private $htmlUrl;

    /** @var MilestoneApiUrl */
    private $apiUrl;

    /** @var MilestoneClosedAt|null */
    private $closedAt;

    /** @var MilestoneCreatedAt */
    private $createdAt;

    /** @var MilestoneUpdatedAt */
    private $updatedAt;

    public function __construct(
        MilestoneId $id,
        MilestoneTitle $title,
        MilestoneDescription $description,
        ?MilestoneDueOn $dueOn,
        MilestoneState $state,
        MilestoneNumber $number,
        MilestoneCreator $creator,
        MilestoneHtmlUrl $htmlUrl,
        MilestoneApiUrl $apiUrl,
        ?MilestoneClosedAt $closedAt,
        MilestoneCreatedAt $createdAt,
        MilestoneUpdatedAt $updatedAt
    ) {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->dueOn       = $dueOn;
        $this->state       = $state;
        $this->number      = $number;
        $this->creator     = $creator;
        $this->htmlUrl     = $htmlUrl;
        $this->apiUrl      = $apiUrl;
        $this->closedAt    = $closedAt;
        $this->createdAt   = $createdAt;
        $this->updatedAt   = $updatedAt;
    }

    public function getId(): MilestoneId
    {
        return $this->id;
    }

    public function getTitle(): MilestoneTitle
    {
        return $this->title;
    }

    public function getDescription(): MilestoneDescription
    {
        return $this->description;
    }

    public function getDueOn(): ?MilestoneDueOn
    {
        return $this->dueOn;
    }

    public function getState(): MilestoneState
    {
        return $this->state;
    }

    public function getNumber(): MilestoneNumber
    {
        return $this->number;
    }

    public function getCreator(): MilestoneCreator
    {
        return $this->creator;
    }

    public function getHtmlUrl(): MilestoneHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): MilestoneApiUrl
    {
        return $this->apiUrl;
    }

    public function getClosedAt(): ?MilestoneClosedAt
    {
        return $this->closedAt;
    }

    public function getCreatedAt(): MilestoneCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): MilestoneUpdatedAt
    {
        return $this->updatedAt;
    }

    public function hasDueOn(): bool
    {
        if (null === $this->dueOn) {
            return false;
        }

        return true;
    }

    public function hasClosedAt(): bool
    {
        if (null === $this->closedAt) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->dueOn) {
            $dueOn = null;
        } else {
            $dueOn = $this->dueOn->serialize();
        }

        if (null === $this->closedAt) {
            $closedAt = null;
        } else {
            $closedAt = $this->closedAt->serialize();
        }

        return [
            'id'          => $this->id->serialize(),
            'title'       => $this->title->serialize(),
            'description' => $this->description->serialize(),
            'dueOn'       => $dueOn,
            'state'       => $this->state->serialize(),
            'number'      => $this->number->serialize(),
            'creator'     => $this->creator->serialize(),
            'htmlUrl'     => $this->htmlUrl->serialize(),
            'apiUrl'      => $this->apiUrl->serialize(),
            'closedAt'    => $closedAt,
            'createdAt'   => $this->createdAt->serialize(),
            'updatedAt'   => $this->updatedAt->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['dueOn']) {
            $dueOn = null;
        } else {
            $dueOn = MilestoneDueOn::deserialize($data['dueOn']);
        }

        if (null === $data['closedAt']) {
            $closedAt = null;
        } else {
            $closedAt = MilestoneClosedAt::deserialize($data['closedAt']);
        }

        return new self(
            MilestoneId::deserialize($data['id']),
            MilestoneTitle::deserialize($data['title']),
            MilestoneDescription::deserialize($data['description']),
            $dueOn,
            MilestoneState::deserialize($data['state']),
            MilestoneNumber::deserialize($data['number']),
            MilestoneCreator::deserialize($data['creator']),
            MilestoneHtmlUrl::deserialize($data['htmlUrl']),
            MilestoneApiUrl::deserialize($data['apiUrl']),
            $closedAt,
            MilestoneCreatedAt::deserialize($data['createdAt']),
            MilestoneUpdatedAt::deserialize($data['updatedAt'])
        );
    }
}
