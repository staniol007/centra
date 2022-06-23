<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub;

use App\Service\KanbanBoard\Schema\GitHub\Type\IssueState;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class Issue extends \App\Service\KanbanBoard\Schema\Issue
{

    /** @var string|null */
    private ?string $nodeId = null;

    /** @var string|null */
    private ?string $url = null;

    /** @var string|null */
    private ?string $repositoryUrl = null;

    /** @var string|null */
    private ?string $labelsUrl = null;

    /** @var string|null */
    private ?string $commentsUrl = null;

    /** @var string|null */
    private ?string $eventsUrl = null;

    /** @var Type\IssueState */
    private Type\IssueState $State = Type\IssueState::OPEN;

    /** @var string|null */
    private ?string $stateReason = null;

    /** @var User|null */
    private ?User $User = null;

    /** @var Assignee[] */
    private array $Assignees = [];

    /** @var Milestone|null */
    private ?Milestone $Milestone = null;

    /** @var bool */
    private bool $locked = false;

    /** @var string|null */
    private ?string $activeLockReason = null;

    /** @var int|null */
    private ?int $comments = null;

    /** @var Assignee|null  */
    private ?Assignee $Assignee = null;

    /** @var \DateTime|null */
    private ?\DateTime $CreatedAt = null;

    /** @var \DateTime|null */
    private ?\DateTime $UpdatedAt = null;

    /** @var User|null */
    private ?User $ClosedBy = null;

    /** @var string|null */
    private ?string $authorAssociation = null;

    /** @var Reaction|null */
    private ?Reaction $Reaction = null;

    /** @var string|null */
    private ?string $timelineUrl = null;

    /** @var PerformedViaGithubApp|null */
    private ?PerformedViaGithubApp $PerformedViaGithubApp = null;

    /** @var PullRequest|null */
    private ?PullRequest $PullRequest = null;

    /** @var Label[] */
    protected array $Labels = [];

    /**
     * @return \App\Service\KanbanBoard\Type\IssueState
     */
    public function getKanbanBoardIssueState(): \App\Service\KanbanBoard\Type\IssueState {
        return match (true) {
            ($this->getState() == Type\IssueState::CLOSED) => \App\Service\KanbanBoard\Type\IssueState::COMPLETED,
            $this->getAssignee() !== null => \App\Service\KanbanBoard\Type\IssueState::ACTIVE,
            default => \App\Service\KanbanBoard\Type\IssueState::QUEUED
        };
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
     * @return Issue
     */
    public function setNodeId(?string $nodeId): Issue
    {
        $this->nodeId = $nodeId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Issue
     */
    public function setUrl(?string $url): Issue
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRepositoryUrl(): ?string
    {
        return $this->repositoryUrl;
    }

    /**
     * @param string|null $repositoryUrl
     * @return Issue
     */
    public function setRepositoryUrl(?string $repositoryUrl): Issue
    {
        $this->repositoryUrl = $repositoryUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLabelsUrl(): ?string
    {
        return $this->labelsUrl;
    }

    /**
     * @param string|null $labelsUrl
     * @return Issue
     */
    public function setLabelsUrl(?string $labelsUrl): Issue
    {
        $this->labelsUrl = $labelsUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCommentsUrl(): ?string
    {
        return $this->commentsUrl;
    }

    /**
     * @param string|null $commentsUrl
     * @return Issue
     */
    public function setCommentsUrl(?string $commentsUrl): Issue
    {
        $this->commentsUrl = $commentsUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEventsUrl(): ?string
    {
        return $this->eventsUrl;
    }

    /**
     * @param string|null $eventsUrl
     * @return Issue
     */
    public function setEventsUrl(?string $eventsUrl): Issue
    {
        $this->eventsUrl = $eventsUrl;
        return $this;
    }

    /**
     * @return Type\IssueState
     */
    public function getState(): Type\IssueState
    {
        return $this->State;
    }

    /**
     * @param Type\IssueState|string $State
     * @return $this
     */
    public function setState(Type\IssueState|string $State): Issue
    {
        $this->State = \is_string($State)
            ? Type\IssueState::from($State)
            : $State;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStateReason(): ?string
    {
        return $this->stateReason;
    }

    /**
     * @param string|null $stateReason
     * @return Issue
     */
    public function setStateReason(?string $stateReason): Issue
    {
        $this->stateReason = $stateReason;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->User;
    }

    /**
     * @param User|array|null $User
     * @return $this\
     */
    public function setUser(User|array|null $User): Issue
    {
        $this->User = \is_array($User)
            ? User::factory($User)
            : $User;
        return $this;
    }

    /**
     * @return Assignee[]
     */
    public function getAssignees(): array
    {
        return $this->Assignees;
    }

    /**
     * @param Assignee[] $Assignees
     * @return Issue
     */
    public function setAssignees(array $Assignees): Issue
    {
        foreach ($Assignees as $Assignee) {
            $this->addAssignee($Assignee);
        }
        return $this;
    }

    /**
     * @param Assignee|array $Assignee
     * @return $this
     */
    public function addAssignee(Assignee|array $Assignee): Issue
    {
        $this->Assignees[] = \is_array($Assignee)
            ? Assignee::factory($Assignee)
            : $Assignee;
        return $this;
    }

    /**
     * @return Milestone|null
     */
    public function getMilestone(): ?Milestone
    {
        return $this->Milestone;
    }

    /**
     * @param Milestone|array|null $Milestone
     * @return $this
     */
    public function setMilestone(Milestone|array|null $Milestone): Issue
    {
        $this->Milestone = \is_array($Milestone)
            ? Milestone::factory($Milestone)
            : $Milestone;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->locked;
    }

    /**
     * @param bool $locked
     * @return Issue
     */
    public function setLocked(bool $locked): Issue
    {
        $this->locked = $locked;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getActiveLockReason(): ?string
    {
        return $this->activeLockReason;
    }

    /**
     * @param string|null $activeLockReason
     * @return Issue
     */
    public function setActiveLockReason(?string $activeLockReason): Issue
    {
        $this->activeLockReason = $activeLockReason;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getComments(): ?int
    {
        return $this->comments;
    }

    /**
     * @param int|null $comments
     * @return Issue
     */
    public function setComments(?int $comments): Issue
    {
        $this->comments = $comments;
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
     * @return Issue
     * @throws \Exception
     */
    public function setCreatedAt(\DateTime|string|null $CreatedAt): Issue
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
    public function setUpdatedAt(\DateTime|string|null $UpdatedAt): Issue
    {
        parent::setDateTime($this->UpdatedAt, $UpdatedAt);
        return $this;
    }

    /**
     * @return User|null
     */
    public function getClosedBy(): ?User
    {
        return $this->ClosedBy;
    }

    /**
     * @param User|array|null $ClosedBy
     * @return $this
     */
    public function setClosedBy(User|array|null $ClosedBy): Issue
    {
        $this->ClosedBy = \is_array($ClosedBy)
            ? User::factory($ClosedBy)
            : $ClosedBy;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthorAssociation(): ?string
    {
        return $this->authorAssociation;
    }

    /**
     * @param string|null $authorAssociation
     * @return Issue
     */
    public function setAuthorAssociation(?string $authorAssociation): Issue
    {
        $this->authorAssociation = $authorAssociation;
        return $this;
    }

    /**
     * @return Reaction|null
     */
    public function getReaction(): ?Reaction
    {
        return $this->Reaction;
    }

    /**
     * @param Reaction|array|null $Reaction
     * @return $this
     */
    public function setReaction(Reaction|array|null $Reaction): Issue
    {
        $this->Reaction = \is_array($Reaction)
            ? Reaction::factory($Reaction)
            : $Reaction;
        return $this;
    }

    /**
     * @param Reaction|array|null $Reaction
     * @return $this
     */
    public function setReactions(Reaction|array|null $Reaction): Issue
    {
        return $this->setReaction($Reaction);
    }

    /**
     * @return string|null
     */
    public function getTimelineUrl(): ?string
    {
        return $this->timelineUrl;
    }

    /**
     * @param string|null $timelineUrl
     * @return Issue
     */
    public function setTimelineUrl(?string $timelineUrl): Issue
    {
        $this->timelineUrl = $timelineUrl;
        return $this;
    }

    /**
     * @return PerformedViaGithubApp|null
     */
    public function getPerformedViaGithubApp(): ?PerformedViaGithubApp
    {
        return $this->PerformedViaGithubApp;
    }

    /**
     * @param PerformedViaGithubApp|array|null $PerformedViaGithubApp
     * @return $this
     */
    public function setPerformedViaGithubApp(PerformedViaGithubApp|array|null $PerformedViaGithubApp): Issue
    {
        $this->PerformedViaGithubApp = \is_array($PerformedViaGithubApp)
            ? PerformedViaGithubApp::factory($PerformedViaGithubApp)
            : $PerformedViaGithubApp;
        return $this;
    }

    /**
     * @return Assignee|null
     */
    public function getAssignee(): ?Assignee
    {
        return $this->Assignee;
    }

    /**
     * @param Assignee|array|null $Assignee
     * @return Issue
     */
    public function setAssignee(Assignee|array|null $Assignee): Issue
    {
        $this->Assignee = \is_array($Assignee)
            ? Assignee::factory($Assignee)
            : $Assignee;
        return $this;
    }

    /**
     * @return Label[]
     */
    public function getLabels(): array
    {
        return $this->Labels;
    }

    /**
     * @param array $Labels
     * @return Issue
     */
    public function setLabels(array $Labels): Issue
    {
        /** @var Label|array $Label */
        foreach ($Labels as $Label) {
            $this->addLabel($Label);
        }
        return $this;
    }

    /**
     * @param Label|array $Lable
     * @return Issue
     */
    public function addLabel(Label|array $Lable): Issue
    {
        if (\is_array($Lable) === true) {
            $Lable = Label::factory($Lable);
        }

        $this->Labels[] = $Lable;
        return $this;
    }

    /**
     * @return PullRequest|null
     */
    public function getPullRequest(): ?PullRequest
    {
        return $this->PullRequest;
    }

    /**
     * @param PullRequest|array|null $PullRequest
     * @return $this
     */
    public function setPullRequest(PullRequest|array|null $PullRequest): static
    {
        $this->PullRequest = \is_array($PullRequest)
            ? PullRequest::factory($PullRequest)
            : $PullRequest;
        return $this;
    }

    /**
     * @return bool
     */
    public function existsPullRequest(): bool
    {
        return $this->getPullRequest() !== null;
    }

    /**
     * @return string[]
     */
    public function getLabelNames(): array
    {
        $labelNames = [];

        /** @var Label $Label */
        foreach ($this->getLabels() as $Label) {
            if ($Label->getName() !== null) {
                $labelNames[] = $Label->getName();
            }
        }

        return $labelNames;
    }

    /**
     * @return string|null
     */
    public function getAssigneeAvatarUrl(): ?string
    {
        return $this->getAssignee()?->getAvatarUrl();
    }

    /**
     * @param mixed|null $value
     * @return int
     * @throws \Exception
     */
    public function getForceOfPaused(mixed $value = null): int
    {
        if (\is_array($value) === false) {
            throw new \Exception("Input value have to be string[] type - paused label names");
        }

        if (\count($value) == 0) {
            return 0;
        }

        $pausedLabelsCount = 0;
        foreach ($this->getLabelNames() as $names) {
            if (\in_array($names, $value) === true) {
                $pausedLabelsCount++;
            }
        }

        return $pausedLabelsCount;
    }

}
