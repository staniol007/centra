<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
interface IssueInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return int
     */
    public function getNumber(): int;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string|null
     */
    public function getBody(): ?string;

    /**
     * @return string|null
     */
    public function getHtmlUrl(): ?string;

    /**
     * @return \DateTime|null
     */
    public function getClosedAt(): ?\DateTime;

    /**
     * @return bool
     */
    public function existsPullRequest(): bool;

    /**
     *
     * @param mixed $value
     * @return int (0 - missing)
     */
    public function getForceOfPaused(mixed $value = null): int;

    /**
     * @return string|null
     */
    public function getAssigneeAvatarUrl(): ?string;

    /**
     * @return \App\Service\KanbanBoard\Type\IssueState
     */
    public function getKanbanBoardIssueState(): \App\Service\KanbanBoard\Type\IssueState;

}