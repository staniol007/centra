<?php declare(strict_types=1);

namespace App\Tests\Service;

use App\Library\Utilities;
use App\Service\KanbanBoard;
use PHPUnit\Framework\TestCase;

/**
 * Unit test for \App\Service\KanbanBoard
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.2
 * @example
 * php bin/phpunit tests/Service/KanbanBoardTest.php
 */
final class KanbanBoardTest extends TestCase
{
    /** @var KanbanBoard|null */
    private KanbanBoard $KanbanBoard;

    /** @var \ReflectionClass */
    private \ReflectionClass $KanbanBoardReflection;

    protected function setUp(): void
    {
        $repositoryNames = \array_filter(
            \array_unique(\explode('|', (string)Utilities::env('GH_REPOSITORIES'))),
            fn(string $repository): bool => $repository != ""
        );
        if (\count($repositoryNames) == 0) {
            throw new \Exception('Missing GitHub repositories!');
        }

        $token = (string)Utilities::env('GH_TOKEN');
        if ($token == '') {
            throw new \Exception('Missing GitHub App token');
        }

        $account = (string)Utilities::env('GH_ACCOUNT');
        if ($account == '') {
            throw new \Exception('Missing GitHub account');
        }

        $this->KanbanBoardReflection = new \ReflectionClass(KanbanBoard::class);

        $this->KanbanBoard = new KanbanBoard(
            new \App\Service\KanbanBoard\Repository\GitHub($token, $account),
            $repositoryNames,
            [KanbanBoard::ISSUE_LABEL_WAITING_FOR_FEEDBACK]
        );
    }

    public function testGetMilestones(): void
    {
        $milestones = $this->KanbanBoard->getMilestones();

        $this->assertIsArray($milestones);
        $this->assertGreaterThan(0, \count($milestones), 'There should be at least one milestone');

        foreach ($milestones as $milestone) {
            $this->assertIsArray($milestone);
            $this->testMilestone($milestone);

            $issues = [
                ...$milestone[\App\Service\KanbanBoard\Type\IssueState::QUEUED->value],
                ...$milestone[\App\Service\KanbanBoard\Type\IssueState::ACTIVE->value],
                ...$milestone[\App\Service\KanbanBoard\Type\IssueState::COMPLETED->value]
            ];

            $this->assertGreaterThanOrEqual(0, \count($issues), 'There should be at least one issue');

            foreach ($issues as $issue) {
                $this->assertIsArray($issue);
                $this->testIssue($issue);
            }
        }
    }

    public function testPercent(): void
    {
        $_percentMethod = $this->KanbanBoardReflection->getMethod('_percent');
        $_percentMethod->setAccessible(true);

        $percent = $_percentMethod->invokeArgs($this->KanbanBoard, [0, 0]);
        $this->testSinglePercent($percent);
        $this->testSinglePercentValues($percent, 0, 0, 0, 0);

        $percent = $_percentMethod->invokeArgs($this->KanbanBoard, [5, 5]);
        $this->testSinglePercent($percent);
        $this->testSinglePercentValues($percent, 10, 5, 5, 50);

        $percent = $_percentMethod->invokeArgs($this->KanbanBoard, [1, 9]);
        $this->testSinglePercent($percent);
        $this->testSinglePercentValues($percent, 10, 1, 9, 10);

        $percent = $_percentMethod->invokeArgs($this->KanbanBoard, [9, 1]);
        $this->testSinglePercent($percent);
        $this->testSinglePercentValues($percent, 10, 9, 1, 90);

        $percent = $_percentMethod->invokeArgs($this->KanbanBoard, [10, 0]);
        $this->testSinglePercent($percent);
        $this->testSinglePercentValues($percent, 10, 10, 0, 100);

        $percent = $_percentMethod->invokeArgs($this->KanbanBoard, [0, 10]);
        $this->testSinglePercent($percent);
        $this->testSinglePercentValues($percent, 10, 0, 10, 0);
    }


    private function testMilestone(array $milestone): void
    {
        $this->assertArrayHasKey('milestone', $milestone);
        $this->assertArrayHasKey('url', $milestone);
        $this->assertArrayHasKey('progress', $milestone);
        $this->assertArrayHasKey(\App\Service\KanbanBoard\Type\IssueState::QUEUED->value, $milestone);
        $this->assertArrayHasKey(\App\Service\KanbanBoard\Type\IssueState::ACTIVE->value, $milestone);
        $this->assertArrayHasKey(\App\Service\KanbanBoard\Type\IssueState::COMPLETED->value, $milestone);

        $this->assertIsString($milestone['milestone'], 'Milestone title should be a string type');
        $this->assertGreaterThanOrEqual(1, \strlen($milestone['milestone']), 'Milestone title should have a value');

        $this->assertIsString($milestone['url'], 'Milestone url should be a string type');
        $this->assertGreaterThanOrEqual(1, \strlen($milestone['url']), 'Milestone url should have a value');

        $this->testSinglePercent($milestone['progress']);

        $this->assertIsArray($milestone);

        $this->assertIsArray($milestone[\App\Service\KanbanBoard\Type\IssueState::QUEUED->value]);
        $this->assertIsArray($milestone[\App\Service\KanbanBoard\Type\IssueState::ACTIVE->value]);
        $this->assertIsArray($milestone[\App\Service\KanbanBoard\Type\IssueState::COMPLETED->value]);
    }

    private function testIssue(array $issue): void
    {
        $this->assertArrayHasKey('id', $issue);
        $this->assertArrayHasKey('number', $issue);
        $this->assertArrayHasKey('title', $issue);
        $this->assertArrayHasKey('body', $issue);
        $this->assertArrayHasKey('url', $issue);
        $this->assertArrayHasKey('assignee', $issue);
        $this->assertArrayHasKey('paused', $issue);
        $this->assertArrayHasKey('progress', $issue);
        $this->assertArrayHasKey('closed', $issue);

        $this->assertIsInt($issue['id'], 'Issue id have to be int type');
        $this->assertIsInt($issue['number'], 'Issue number have to be int type');
        $this->assertIsString($issue['title'], 'Issue title have to be string type');
        $this->assertIsString($issue['body'], 'Issue body have to be string type');
        $this->assertIsString($issue['url'], 'Issue url have to be string type');
        $this->assertTrue(\in_array(\gettype($issue['assignee']), ['NULL', 'string']), 'Issue assignee have to be string or null');
        $this->assertIsInt($issue['paused'], 'Issue paused have to be int type');
        $this->assertIsArray($issue['progress'], 'Issue progress have to be array');
        $this->assertTrue(\in_array(\gettype($issue['closed']), ['NULL', 'string']), 'Issue closed have to be string or null');

        $this->assertGreaterThanOrEqual(1, $issue['id']);
        $this->assertGreaterThanOrEqual(1, $issue['number']);
        $this->assertGreaterThanOrEqual(1, \strlen($issue['title']), 'Issue title should have a value');
        $this->assertGreaterThanOrEqual(1, \strlen($issue['url']), 'Issue url should have a value');
        $this->assertGreaterThanOrEqual(0, $issue['paused']);

        $this->testSinglePercent($issue['progress']);

        if ($issue['closed'] !== null) {
            $Date = \DateTime::createFromFormat('Y-m-d H:i:s', $issue['closed']);
            $this->assertTrue($Date !== false, 'Issue closed is not date time format: Y-m-d H:i:s');
            $this->assertEquals($Date->format('Y-m-d H:i:s'), $issue['closed'], 'Issue closed mishmash');
        }

    }

    /**
     * @param mixed $percent
     * @return void
     */
    private function testSinglePercent(mixed $percent): void
    {
        $this->assertIsArray($percent);

        $this->assertCount(4, $percent);

        $this->assertArrayHasKey('total', $percent);
        $this->assertArrayHasKey('complete', $percent);
        $this->assertArrayHasKey('remaining', $percent);
        $this->assertArrayHasKey('percent', $percent);

        $this->assertIsInt($percent['total'], 'Total have to be int type');
        $this->assertIsInt($percent['complete'], 'Complete have to be int type');
        $this->assertIsInt($percent['remaining'], 'Remaining have to be int type');
        $this->assertIsFloat($percent['percent'], 'Percent have to be float type');

        $this->assertGreaterThanOrEqual(0, $percent['total']);
        $this->assertGreaterThanOrEqual(0, $percent['complete']);
        $this->assertGreaterThanOrEqual(0, $percent['remaining']);

        $this->assertGreaterThanOrEqual(0, $percent['percent']);
        $this->assertLessThanOrEqual(100, $percent['percent']);
    }

    /**
     * @param array $percent
     * @param int $totalValue
     * @param int $completeValue
     * @param int $remainingValue
     * @param int $percentValue
     * @return void
     */
    private function testSinglePercentValues(array $percent, int $totalValue, int $completeValue, int $remainingValue, int $percentValue): void
    {
        $this->assertEquals($percent['total'], $totalValue);
        $this->assertEquals($percent['complete'], $completeValue);
        $this->assertEquals($percent['remaining'], $remainingValue);
        $this->assertEquals($percent['percent'], $percentValue);
    }

}
