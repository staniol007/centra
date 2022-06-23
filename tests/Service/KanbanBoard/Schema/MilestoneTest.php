<?php declare(strict_types=1);

namespace App\Tests\Service\KanbanBoard\Schema;

use PHPUnit\Framework\TestCase;
use \App\Service\KanbanBoard\Schema\Milestone;

/**
 * Unit test for \App\Service\KanbanBoard\Schema\Milestone
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 * @example
 * php bin/phpunit tests/Service/KanbanBoard/Schema/MilestoneTest.php
 */
final class MilestoneTest extends TestCase
{

    public function testFactory01(): void
    {
        $schema = [
            'number' => 123,
            'title' => 'title test',
            'description' => 'description test',
            'html_url' => 'htl url test',
            'closed_issues' => 1,
            'open_issues' => 3,
        ];

        $Milestone = Milestone::factory($schema);

        $this->assertInstanceOf(\App\Service\KanbanBoard\Schema\MilestoneInterface::class, $Milestone);
        $this->assertIsInt($Milestone->getNumber());
        $this->assertIsString($Milestone->getTitle());
        $this->assertIsString($Milestone->getDescription());
        $this->assertIsString($Milestone->getHtmlUrl());
        $this->assertIsInt($Milestone->getClosedIssues());
        $this->assertIsInt($Milestone->getOpenIssues());

        $this->assertEquals($schema['number'], $Milestone->getNumber());
        $this->assertEquals($schema['title'], $Milestone->getTitle());
        $this->assertEquals($schema['description'], $Milestone->getDescription());
        $this->assertEquals($schema['html_url'], $Milestone->getHtmlUrl());
        $this->assertEquals($schema['closed_issues'], $Milestone->getClosedIssues());
        $this->assertEquals($schema['open_issues'], $Milestone->getOpenIssues());

        $number = 123445;
        $title = 'aa';
        $description = 'bb';
        $htmlUrl = 'cc';
        $closedIssues = 5;
        $openIssues = 7;
        $this->assertSame($Milestone, $Milestone->setNumber($number));
        $this->assertSame($Milestone, $Milestone->setTitle($title));
        $this->assertSame($Milestone, $Milestone->setDescription($description));
        $this->assertSame($Milestone, $Milestone->setHtmlUrl($htmlUrl));
        $this->assertSame($Milestone, $Milestone->setClosedIssues($closedIssues));
        $this->assertSame($Milestone, $Milestone->setOpenIssues($openIssues));

        $this->assertEquals($number, $Milestone->getNumber());
        $this->assertEquals($title, $Milestone->getTitle());
        $this->assertEquals($description, $Milestone->getDescription());
        $this->assertEquals($htmlUrl, $Milestone->getHtmlUrl());
        $this->assertEquals($closedIssues, $Milestone->getClosedIssues());
        $this->assertEquals($openIssues, $Milestone->getOpenIssues());
    }

}
