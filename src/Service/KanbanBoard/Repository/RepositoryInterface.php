<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Repository;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 */
interface RepositoryInterface
{
    /**
     * @param string $repositoryName
     * @return \App\Service\KanbanBoard\Schema\MilestoneInterface[]
     */
    public function getMilestones(string $repositoryName): array;

    /**
     * @param string $repositoryName
     * @param int $milestoneNumber
     * @return \App\Service\KanbanBoard\Schema\IssueInterface[]
     */
    public function getIssues(string $repositoryName, int $milestoneNumber): array;

}
