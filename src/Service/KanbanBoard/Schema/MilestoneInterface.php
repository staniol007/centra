<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
interface MilestoneInterface
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return string
     */
    public function getHtmlUrl(): string;

    /**
     * @return int
     */
    public function getClosedIssues(): int;

    /**
     * @return int
     */
    public function getOpenIssues(): int;

    /**
     * @return int
     */
    public function getNumber(): int;

}
