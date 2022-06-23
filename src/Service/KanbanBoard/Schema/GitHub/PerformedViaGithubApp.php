<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class PerformedViaGithubApp extends \App\Service\KanbanBoard\Schema\Schema
{
    /** @var int|null */
    private ?int $id = null;

    /** @var string|null */
    private ?string $slug = null;

    /** @var string|null */
    private ?string $nodeId = null;

    /** @var User|null */
    private ?User $Owner = null;

    /** @var string|null */
    private ?string $name = null;

    /** @var string|null */
    private ?string $description = null;

    /** @var string|null */
    private ?string $externalUrl = null;

    /** @var string|null */
    private ?string $htmlUrl = null;

    /** @var \DateTime|null */
    private ?\DateTime $CreatedAt = null;

    /** @var \DateTime|null */
    private ?\DateTime $UpdatedAt = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return PerformedViaGithubApp
     */
    public function setId(?int $id): PerformedViaGithubApp
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     * @return PerformedViaGithubApp
     */
    public function setSlug(?string $slug): PerformedViaGithubApp
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNodeId(): ?string
    {
        return $this->nodeId;
    }

    /**
     * @param string|null $nodeId
     * @return PerformedViaGithubApp
     */
    public function setNodeId(?string $nodeId): PerformedViaGithubApp
    {
        $this->nodeId = $nodeId;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getOwner(): ?User
    {
        return $this->Owner;
    }

    /**
     * @param User|array|null $Owner
     * @return $this
     */
    public function setOwner(User|array|null $Owner): PerformedViaGithubApp
    {
        $this->Owner = \is_array($Owner)
            ? User::factory($Owner)
            : $Owner;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return PerformedViaGithubApp
     */
    public function setName(?string $name): PerformedViaGithubApp
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return PerformedViaGithubApp
     */
    public function setDescription(?string $description): PerformedViaGithubApp
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalUrl(): ?string
    {
        return $this->externalUrl;
    }

    /**
     * @param string|null $externalUrl
     * @return PerformedViaGithubApp
     */
    public function setExternalUrl(?string $externalUrl): PerformedViaGithubApp
    {
        $this->externalUrl = $externalUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHtmlUrl(): ?string
    {
        return $this->htmlUrl;
    }

    /**
     * @param string|null $htmlUrl
     * @return PerformedViaGithubApp
     */
    public function setHtmlUrl(?string $htmlUrl): PerformedViaGithubApp
    {
        $this->htmlUrl = $htmlUrl;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->CreatedAt;
    }

    /**
     * @param \DateTime|string|null $CreatedAt
     * @return PerformedViaGithubApp
     */
    public function setCreatedAt(\DateTime|string|null $CreatedAt): PerformedViaGithubApp
    {
        parent::setDateTime($this->CreatedAt, $CreatedAt);
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->UpdatedAt;
    }

    /**
     * @param \DateTime|string|null $UpdatedAt
     * @return $this
     * @throws \Exception
     */
    public function setUpdatedAt(\DateTime|string|null $UpdatedAt): PerformedViaGithubApp
    {
        parent::setDateTime($this->UpdatedAt, $UpdatedAt);
        return $this;
    }

}