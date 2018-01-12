<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Label\LabelApiUrl;
use DevboardLib\GitHub\Label\LabelColor;
use DevboardLib\GitHub\Label\LabelId;
use DevboardLib\GitHub\Label\LabelName;

/**
 * @see \spec\DevboardLib\GitHub\GitHubLabelSpec
 * @see \Tests\DevboardLib\GitHub\GitHubLabelTest
 */
class GitHubLabel
{
    /** @var LabelId */
    private $id;

    /** @var LabelName */
    private $name;

    /** @var LabelColor */
    private $color;

    /** @var bool */
    private $default;

    /** @var LabelApiUrl */
    private $apiUrl;

    public function __construct(LabelId $id, LabelName $name, LabelColor $color, bool $default, LabelApiUrl $apiUrl)
    {
        $this->id      = $id;
        $this->name    = $name;
        $this->color   = $color;
        $this->default = $default;
        $this->apiUrl  = $apiUrl;
    }

    public function getId(): LabelId
    {
        return $this->id;
    }

    public function getName(): LabelName
    {
        return $this->name;
    }

    public function getColor(): LabelColor
    {
        return $this->color;
    }

    public function isDefault(): bool
    {
        return $this->default;
    }

    public function getApiUrl(): LabelApiUrl
    {
        return $this->apiUrl;
    }

    public function serialize(): array
    {
        return [
            'id'      => $this->id->serialize(),
            'name'    => $this->name->serialize(),
            'color'   => $this->color->serialize(),
            'default' => $this->default,
            'apiUrl'  => $this->apiUrl->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            LabelId::deserialize($data['id']),
            LabelName::deserialize($data['name']),
            LabelColor::deserialize($data['color']),
            $data['default'],
            LabelApiUrl::deserialize($data['apiUrl'])
        );
    }
}
