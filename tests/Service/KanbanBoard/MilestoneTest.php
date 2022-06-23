<?php declare(strict_types=1);

namespace App\Tests\Service\KanbanBoard;

use PHPUnit\Framework\TestCase;
use App\Service\KanbanBoard\Type\IssueState;
use App\Service\KanbanBoard\Milestone;
use App\Service\KanbanBoard\Percent;

/**
 * Unit test for \App\Service\KanbanBoard\Milestone
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 * @example
 * php bin/phpunit tests/Service/KanbanBoard/MilestoneTest.php
 *
 */
class MilestoneTest extends TestCase
{

    public function testMilestone(): void
    {
        $Milestone = new Milestone(
            'test',
            'test url',
            new Percent(3, 5),
            [],
            [],
            [],
        );

        $this->milestoneTest($Milestone);
    }

    /**
     * @param Milestone $Milestone
     * @return void
     */
    public function milestoneTest(Milestone $Milestone): void
    {
        $this->assertObjectHasAttribute('milestone', $Milestone);
        $this->assertObjectHasAttribute('url', $Milestone);
        $this->assertObjectHasAttribute('progress', $Milestone);
        $this->assertObjectHasAttribute(IssueState::QUEUED->value, $Milestone);
        $this->assertObjectHasAttribute(IssueState::ACTIVE->value, $Milestone);
        $this->assertObjectHasAttribute(IssueState::COMPLETED->value, $Milestone);

        $this->assertIsString($Milestone->getMilestone(), 'Milestone title should be a string type');
        $this->assertGreaterThanOrEqual(1, \strlen($Milestone->getMilestone()), 'Milestone title should have a value');

        $this->assertIsString($Milestone->getUrl(), 'Milestone url should be a string type');
        $this->assertGreaterThanOrEqual(1, \strlen($Milestone->getUrl()), 'Milestone url should have a value');

        $this->singlePercentTest($Milestone->getProgress());

        $this->assertIsArray($Milestone->getQueued());
        $this->assertIsArray($Milestone->getActive());
        $this->assertIsArray($Milestone->getCompleted());
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
