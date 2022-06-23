<?php declare(strict_types=1);

namespace App\Tests\Service\KanbanBoard;

use PHPUnit\Framework\TestCase;
use App\Service\KanbanBoard\Issue;
use App\Service\KanbanBoard\Percent;

/**
 * Unit test for \App\Service\KanbanBoard\Issue
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 * @example
 * php bin/phpunit tests/Service/KanbanBoard/IssueTest.php
 *
 */
class IssueTest extends TestCase
{

    public function testIssue(): void
    {
        $Issue = new Issue(
            id: 1,
            number: 2,
            title: 'test',
            body: 'test body',
            url: 'url test',
            assignee: 'assignee test',
            paused: 0,
            progress: new Percent(3, 8),
            closed: null
        );

        $this->issueTest($Issue);
    }

    /**
     * @param Issue $Issue
     * @return void
     */
    public function issueTest(Issue $Issue): void
    {
        $this->assertObjectHasAttribute('id', $Issue);
        $this->assertObjectHasAttribute('number', $Issue);
        $this->assertObjectHasAttribute('title', $Issue);
        $this->assertObjectHasAttribute('body', $Issue);
        $this->assertObjectHasAttribute('url', $Issue);
        $this->assertObjectHasAttribute('assignee', $Issue);
        $this->assertObjectHasAttribute('paused', $Issue);
        $this->assertObjectHasAttribute('progress', $Issue);
        $this->assertObjectHasAttribute('closed', $Issue);

        $this->assertIsInt($Issue->getId(), 'Issue id have to be int type');
        $this->assertIsInt($Issue->getNumber(), 'Issue number have to be int type');
        $this->assertIsString($Issue->getTitle(), 'Issue title have to be string type');
        $this->assertIsString($Issue->getBody(), 'Issue body have to be string type');
        $this->assertIsString($Issue->getUrl(), 'Issue url have to be string type');
        $this->assertTrue(\in_array(\gettype($Issue->getAssignee()), ['NULL', 'string']), 'Issue assignee have to be string or null');
        $this->assertIsInt($Issue->getPaused(), 'Issue paused have to be int type');
        $this->assertInstanceOf(Percent::class, $Issue->getProgress(), 'Issue progress have to be Percent type');
        $this->assertTrue(\in_array(\gettype($Issue->getClosed()), ['NULL', 'string']), 'Issue closed have to be string or null');

        $this->assertGreaterThanOrEqual(1, $Issue->getId());
        $this->assertGreaterThanOrEqual(1, $Issue->getNumber());
        $this->assertGreaterThanOrEqual(1, \strlen($Issue->getTitle()), 'Issue title should have a value');
        $this->assertGreaterThanOrEqual(1, \strlen($Issue->getUrl()), 'Issue url should have a value');
        $this->assertGreaterThanOrEqual(0, $Issue->getPaused());

        $this->singlePercentTest($Issue->getProgress());

        if ($Issue->getClosed() !== null) {
            $Date = \DateTime::createFromFormat('Y-m-d H:i:s', $Issue->getClosed());
            $this->assertTrue($Date !== false, 'Issue closed is not date time format: Y-m-d H:i:s');
            $this->assertEquals($Date->format('Y-m-d H:i:s'), $Issue->getClosed(), 'Issue closed mishmash');
        }
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
