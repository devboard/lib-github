<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see \spec\DevboardLib\GitHub\Repo\RepoParentSpec
 * @see \Tests\DevboardLib\GitHub\Repo\RepoParentTest
 */
class RepoParent
{
    /** @var RepoId */
    private $id;

    /** @var RepoFullName */
    private $fullName;

    public function __construct(RepoId $id, RepoFullName $fullName)
    {
        $this->id       = $id;
        $this->fullName = $fullName;
    }

    public function getId(): RepoId
    {
        return $this->id;
    }

    public function getFullName(): RepoFullName
    {
        return $this->fullName;
    }

    public function serialize(): array
    {
        return [
            'id'       => $this->id->serialize(),
            'fullName' => $this->fullName->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(RepoId::deserialize($data['id']), RepoFullName::deserialize($data['fullName']));
    }
}
