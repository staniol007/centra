<?php declare(strict_types=1);

namespace App\Service;

use App\Library\Utilities;
use Michelf\Markdown;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.2
 */
class KanbanBoard
{

    /** @var string */
    const ISSUE_LABEL_WAITING_FOR_FEEDBACK = 'waiting-for-feedback';

    /**
     * @var array|null
     */
    private ?array $milestones = null;

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
     * @return array
     */
    public function getMilestones(): array
    {
        if ($this->milestones === null) {
            $this->milestones = [];

            /** @var string $repositoryName */
            foreach ($this->repositoryNames as $repositoryName) {
                /** @var \App\Service\KanbanBoard\Schema\MilestoneInterface $Milestone */
                foreach ($this->Repository->getMilestones($repositoryName) as $Milestone) {

                    $percent = $this->_percent($Milestone->getClosedIssues(), $Milestone->getOpenIssues());
                    if ($percent['total'] == 0) {
                        continue;
                    }

                    $issues = $this->issues($repositoryName, $Milestone->getNumber());

                    $this->milestones[$Milestone->getTitle()] = [
                        'milestone' => $Milestone->getTitle(),
                        'url' => $Milestone->getHtmlUrl(),
                        'progress' => $percent,
                        \App\Service\KanbanBoard\Type\IssueState::QUEUED->value => $issues[\App\Service\KanbanBoard\Type\IssueState::QUEUED->value] ?? [],
                        \App\Service\KanbanBoard\Type\IssueState::ACTIVE->value => $issues[\App\Service\KanbanBoard\Type\IssueState::ACTIVE->value] ?? [],
                        \App\Service\KanbanBoard\Type\IssueState::COMPLETED->value => $issues[\App\Service\KanbanBoard\Type\IssueState::COMPLETED->value] ?? [],
                    ];
                }
            }

            \ksort($this->milestones);
            $this->milestones = \array_values($this->milestones);
        }

        return $this->milestones;
    }

    /**
     * @param string $repository
     * @param int $milestoneNumber
     * @return array
     */
    private function issues(string $repository, int $milestoneNumber): array
    {
        $issues = [];

        /** @var  \App\Service\KanbanBoard\Schema\IssueInterface $Issue */
        foreach ($this->Repository->getIssues($repository, $milestoneNumber) as $Issue) {
            if ($Issue->existsPullRequest() === true) {
                continue;
            }

            $state = $Issue->getKanbanBoardIssueState()->value;

            $issues[$state][] = [
                'id' => $Issue->getId(),
                'number' => $Issue->getNumber(),
                'title' => $Issue->getTitle(),
                'body' => Markdown::defaultTransform((string)$Issue->getBody()),
                'url' => (string)$Issue->getHtmlUrl(),
                'assignee' => $Issue->getAssigneeAvatarUrl() !== null
                    ? $Issue->getAssigneeAvatarUrl() . '?s=16'
                    : null,
                'paused' => $Issue->getForceOfPaused($this->pausedLabels),
                'progress' => $this->_percent(
                    \substr_count(\strtolower((string)$Issue->getBody()), '[x]'),
                    \substr_count(\strtolower((string)$Issue->getBody()), '[ ]')),
                'closed' => $Issue->getClosedAt()?->format('Y-m-d H:i:s'),
            ];
        }

        if (Utilities::hasValue($issues, \App\Service\KanbanBoard\Type\IssueState::ACTIVE->value) === true
            && \count($issues[\App\Service\KanbanBoard\Type\IssueState::ACTIVE->value]) > 1
        ) {
            \usort($issues[\App\Service\KanbanBoard\Type\IssueState::ACTIVE->value], function (array $a, array $b): int {
                return $a['paused'] == $b['paused']
                    ? \strcmp($a['title'], $b['title'])
                    : $a['paused'] - $b['paused'];
            });
        }

        return $issues;
    }

    /**
     * @param int $complete
     * @param int $remaining
     * @return array
     */
    private function _percent(int $complete, int $remaining): array
    {
        $total = $complete + $remaining;

        $percent = $total > 0 && $complete > 0
            ? \round($complete / $total * 100)
            : 0.0;

        return [
            'total' => $total,
            'complete' => $complete,
            'remaining' => $remaining,
            'percent' => $percent
        ];
    }

}
