<?php declare(strict_types=1);

namespace App\Tests\Service;

use App\Library\Utilities;
use App\Service\KanbanBoard;
use App\Service\KanbanBoard\Milestone;
use App\Service\KanbanBoard\Issue;
use App\Service\KanbanBoard\Percent;
use App\Service\KanbanBoard\Type\IssueLabel;
use App\Service\KanbanBoard\Type\IssueState;
use PHPUnit\Framework\TestCase;

/**
 * Unit test for \App\Service\KanbanBoard
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.3
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
            [IssueLabel::WAITING_FOR_FEEDBACK->value]
        );
    }

    public function testGetMilestones(): void
    {
        $Milestones = $this->KanbanBoard->getMilestones();

        $this->assertIsArray($Milestones);
        $this->assertGreaterThan(0, \count($Milestones), 'There should be at least one milestone');

        foreach ($Milestones as $Milestone) {
            $this->assertInstanceOf(Milestone::class, $Milestone);
            $this->milestoneTest($Milestone);

            $Issues = [
                ...$Milestone->getQueued(),
                ...$Milestone->getActive(),
                ...$Milestone->getCompleted()
            ];

            $this->assertGreaterThanOrEqual(0, \count($Issues), 'There should be at least one issue');

            foreach ($Issues as $Issue) {
                $this->assertInstanceOf(Issue::class, $Issue);
                $this->issueTest($Issue);
            }
        }
    }

    /**
     * @param Milestone $Milestone
     * @return void
     */
    private function milestoneTest(Milestone $Milestone): void
    {
        (new \App\Tests\Service\KanbanBoard\MilestoneTest())
            ->milestoneTest($Milestone);
    }

    private function issueTest(Issue $Issue): void
    {
        (new \App\Tests\Service\KanbanBoard\IssueTest())
            ->issueTest($Issue);
    }

    /**
     * @param mixed $Percent
     * @return void
     */
    private function singlePercentTest(mixed $Percent): void
    {
        (new \App\Tests\Service\KanbanBoard\PercentTest())
            ->singlePercentTest($Percent);
    }

}
