<?php declare(strict_types=1);

namespace App\Service\KanbanBoard;

use App\Library\Utilities;
use \Michelf\Markdown;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.1
 */
class Application
{
    /** @var string */
    const ISSUE_STAGE_COMPLETED = 'completed';

    /** @var string */
    const ISSUE_STAGE_ACTIVE = 'active';

    /** @var string */
    const ISSUE_STAGE_QUEUED = 'queued';

    /** @var string */
    const ISSUE_LABEL_WAITING_FOR_FEEDBACK = 'waiting-for-feedback';

    /**
     * @param \App\Service\KanbanBoard\Github $Github
     * @param string[] $repositories
     * @param string[] $pausedLabels
     */
    public function __construct(
        private \App\Service\KanbanBoard\Github $Github,
        private array                           $repositories,
        private array                           $pausedLabels = []
    )
    {
    }

    /**
     * @return array
     */
    public function board(): array
    {
        $milestones = [];

        /** @var string $repository */
        foreach ($this->repositories as $repository) {
            /** @var array $milestone */
            foreach ($this->Github->milestones($repository) as $milestone) {

                $percent = $this->_percent($milestone['closed_issues'], $milestone['open_issues']);
                if (empty($percent) === true) {
                    continue;
                }

                $issues = $this->issues($repository, $milestone['number']);

                $milestones[$milestone['title']] = [
                    'milestone' => $milestone['title'],
                    'url' => $milestone['html_url'],
                    'progress' => $percent,
                    self::ISSUE_STAGE_QUEUED => $issues[self::ISSUE_STAGE_QUEUED] ?? [],
                    self::ISSUE_STAGE_ACTIVE => $issues[self::ISSUE_STAGE_ACTIVE] ?? [],
                    self::ISSUE_STAGE_COMPLETED => $issues[self::ISSUE_STAGE_COMPLETED] ?? [],
                ];
            }
        }

        \ksort($milestones);
        return \array_values($milestones);
    }

    /**
     * @param string $repository
     * @param int $milestoneId
     * @return array
     */
    private function issues(string $repository, int $milestoneId): array
    {
        $issues = [];

        /** @var array $issue */
        foreach ($this->Github->issues($repository, $milestoneId) as $issue) {
            if (isset($issue['pull_request'])) {
                continue;
            }

            $state = $this->_state($issue);

            $issues[$state][] = [
                'id' => $issue['id'],
                'number' => $issue['number'],
                'title' => $issue['title'],
                'body' => Markdown::defaultTransform($issue['body'] ?? ''),
                'url' => $issue['html_url'],
                'assignee' => Utilities::hasValue($issue, 'assignee') && Utilities::hasValue($issue['assignee'], 'avatar_url')
                    ? $issue['assignee']['avatar_url'] . '?s=16'
                    : null,
                'paused' => $this->_labelsMatch($issue),
                'progress' => $this->_percent(
                    \substr_count(\strtolower($issue['body'] ?? ''), '[x]'),
                    \substr_count(\strtolower($issue['body'] ?? ''), '[ ]')),
                'closed' => $issue['closed_at'],
            ];
        }

        if (Utilities::hasValue($issues, self::ISSUE_STAGE_ACTIVE) === true && \count($issues[self::ISSUE_STAGE_ACTIVE]) > 1) {
            \usort($issues[self::ISSUE_STAGE_ACTIVE], function (array $a, array $b): int {
                return \count($a['paused']) - \count($b['paused']) === 0
                    ? \strcmp($a['title'], $b['title'])
                    : \count($a['paused']) - \count($b['paused']);
            });
        }

        return $issues;
    }

    /**
     * @param array $issue
     * @return string
     */
    private function _state(array $issue): string
    {
        return match (true) {
            ($issue['state'] == 'closed') => self::ISSUE_STAGE_COMPLETED,
            Utilities::hasValue($issue, 'assignee') => self::ISSUE_STAGE_ACTIVE,
            default => self::ISSUE_STAGE_QUEUED
        };
    }

    /**
     * @param array $issue
     * @return string[]
     */
    private function _labelsMatch(array $issue): array
    {
        $result = [];

        if (Utilities::hasValue($issue, 'labels') && \count($this->pausedLabels) > 0) {
            /** @var array $label */
            foreach ($issue['labels'] as $label) {
                if (Utilities::hasValue($label, 'name') && \in_array($label['name'], $this->pausedLabels)) {
                    $result = [$label['name']];
                    break;
                }
            }
        }

        return $result;
    }

    /**
     * @param int $complete
     * @param int $remaining
     * @return array
     */
    private function _percent(int $complete, int $remaining): array
    {
        $total = $complete + $remaining;

        if ($total == 0) {
            return [];
        }

        $percent = $complete > 0 || $remaining > 0
            ? \round($complete / $total * 100)
            : 0;

        return [
            'total' => $total,
            'complete' => $complete,
            'remaining' => $remaining,
            'percent' => $percent
        ];
    }

}
