<?php declare(strict_types=1);

namespace App\Service;

use App\Library\Utilities;
use Michelf\Markdown;
use App\Service\KanbanBoard\Type\IssueState;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.3
 */
class KanbanBoard
{

    /**
     * @var KanbanBoard\Percent[]|null
     */
    private ?array $Milestones = null;

    /**
     * @param \App\Service\KanbanBoard\Repository\RepositoryInterface $Repository
     * @param string[] $repositoryNames
     * @param string[] $pausedLabels
     */
    public function __construct(
        private \App\Service\KanbanBoard\Repository\RepositoryInterface $Repository,
        private array                                                   $repositoryNames,
        private array                                                   $pausedLabels = []
    )
    {
    }

    /**
     * @return KanbanBoard\Milestone[]
     */
    public function getMilestones(): array
    {
        if ($this->Milestones === null) {
            $this->Milestones = [];

            /** @var string $repositoryName */
            foreach ($this->repositoryNames as $repositoryName) {
                /** @var \App\Service\KanbanBoard\Schema\MilestoneInterface $Milestone */
                foreach ($this->Repository->getMilestones($repositoryName) as $Milestone) {

                    $Percent = new KanbanBoard\Percent(
                        $Milestone->getClosedIssues(),
                        $Milestone->getOpenIssues()
                    );

                    if ($Percent->getTotal() == 0) {
                        continue;
                    }

                    $issues = $this->getIssues($repositoryName, $Milestone->getNumber());

                    $this->Milestones[$Milestone->getTitle()] = new KanbanBoard\Milestone(
                        $Milestone->getTitle(),
                        $Milestone->getHtmlUrl(),
                        $Percent,
                        $issues[IssueState::QUEUED->value] ?? [],
                        $issues[IssueState::ACTIVE->value] ?? [],
                        $issues[IssueState::COMPLETED->value] ?? []
                    );
                }
            }

            \ksort($this->Milestones);
            $this->Milestones = \array_values($this->Milestones);
        }

        return $this->Milestones;
    }

    /**
     * @param string $repository
     * @param int $milestoneNumber
     * @return array
     */
    private function getIssues(string $repository, int $milestoneNumber): array
    {
        $issues = [];

        /** @var  \App\Service\KanbanBoard\Schema\IssueInterface $Issue */
        foreach ($this->Repository->getIssues($repository, $milestoneNumber) as $Issue) {
            if ($Issue->existsPullRequest() === true) {
                continue;
            }

            $state = $Issue->getKanbanBoardIssueState()->value;

            $issues[$state][] = new KanbanBoard\Issue(
                id: $Issue->getId(),
                number: $Issue->getNumber(),
                title: $Issue->getTitle(),
                body: Markdown::defaultTransform((string)$Issue->getBody()),
                url: (string)$Issue->getHtmlUrl(),
                assignee: $Issue->getAssigneeAvatarUrl() !== null
                    ? $Issue->getAssigneeAvatarUrl() . '?s=16'
                    : null,
                paused: $Issue->getForceOfPaused($this->pausedLabels),
                progress: new KanbanBoard\Percent(
                    \substr_count(\strtolower((string)$Issue->getBody()), '[x]'),
                    \substr_count(\strtolower((string)$Issue->getBody()), '[ ]')
                ),
                closed: $Issue->getClosedAt()?->format('Y-m-d H:i:s')
            );
        }

        if (Utilities::hasValue($issues, IssueState::ACTIVE->value) === true) {
            \usort(
                $issues[IssueState::ACTIVE->value],
                function (KanbanBoard\Issue $a, KanbanBoard\Issue $b): int {
                    return $a->getPaused() == $b->getPaused()
                        ? \strcmp($a->getTitle(), $b->getTitle())
                        : $a->getPaused() - $b->getPaused();
                }
            );
        }

        return $issues;
    }

}
