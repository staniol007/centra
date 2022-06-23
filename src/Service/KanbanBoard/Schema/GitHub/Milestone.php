<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class Milestone extends \App\Service\KanbanBoard\Schema\Milestone
{
    /** @var int */
    private int $id;

    /** @var string */
    private string $url;

    /** @var string */
    private string $labelsUrl;

    /** @var string|null */
    private string $nodeId;

    /** @var Type\MilestoneState */
    private Type\MilestoneState $State = Type\MilestoneState::OPEN;

    /** @var User */
    private User $Creator;

    /** @var \DateTime */
    private \DateTime $CreatedAt;

    /** @var \DateTime */
    private \DateTime $UpdatedAt;

    /** @var \DateTime|null */
    private ?\DateTime $ClosedAt = null;

    /** @var \DateTime|null */
    private ?\DateTime $DueOn = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Milestone
     */
    public function setId(int $id): Milestone
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Milestone
     */
    public function setUrl(string $url): Milestone
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabelsUrl(): string
    {
        return $this->labelsUrl;
    }

    /**
     * @param string $labelsUrl
     * @return Milestone
     */
    public function setLabelsUrl(string $labelsUrl): Milestone
    {
        $this->labelsUrl = $labelsUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getNodeId(): string
    {
        return $this->nodeId;
    }

    /**
     * @param string $nodeId
     * @return Milestone
     */
    public function setNodeId(string $nodeId): Milestone
    {
        $this->nodeId = $nodeId;
        return $this;
    }

    /**
     * @return Type\MilestoneState
     */
    public function getState(): Type\MilestoneState
    {
        return $this->State;
    }

    /**
     * @param Type\MilestoneState $State
     * @return Milestone
     */
    public function setState(Type\MilestoneState|string $State): Milestone
    {
        $this->State = \is_string($State)
            ? Type\MilestoneState::from($State)
            : $State;

        return $this;
    }

    /**
     * @return User
     */
    public function getCreator(): User
    {
        return $this->Creator;
    }

    /**
     * @param User|array $Creator
     * @return Milestone
     */
    public function setCreator(User|array $Creator): Milestone
    {
        $this->Creator = \is_array($Creator)
            ? \App\Service\KanbanBoard\Schema\Github\User::factory($Creator)
            : $Creator;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->CreatedAt;
    }

    /**
     * @param \DateTime|string $CreatedAt
     * @return Milestone
     */
    public function setCreatedAt(\DateTime|string $CreatedAt): Milestone
    {
        $this->CreatedAt = \is_string($CreatedAt)
            ? new \DateTime($CreatedAt)
            : $CreatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->UpdatedAt;
    }

    /**
     * @param \DateTime|string $UpdatedAt
     * @return Milestone
     */
    public function setUpdatedAt(\DateTime|string $UpdatedAt): Milestone
    {
        $this->UpdatedAt = \is_string($UpdatedAt)
            ? new \DateTime($UpdatedAt)
            : $UpdatedAt;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getClosedAt(): ?\DateTime
    {
        return $this->ClosedAt;
    }

    /**
     * @param \DateTime|string|null $ClosedAt
     * @return $this
     * @throws \Exception
     */
    public function setClosedAt(\DateTime|string|null $ClosedAt): Milestone
    {
        parent::setDateTime($this->ClosedAt, $ClosedAt);
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDueOn(): ?\DateTime
    {
        return $this->DueOn;
    }

    /**
     * @param \DateTime|string|null $DueOn
     * @return Milestone
     */
    public function setDueOn(\DateTime|string|null $DueOn): Milestone
    {
        parent::setDateTime($this->DueOn, $DueOn);
        return $this;
    }

}