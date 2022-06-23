<?php declare(strict_types=1);

namespace App\Tests\Service\KanbanBoard\Schema;

use PHPUnit\Framework\TestCase;

/**
 * Unit test for \App\Service\KanbanBoard\Schema\Issue
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 * @example
 * php bin/phpunit tests/Service/KanbanBoard/Schema/IssueTest.php
 */
final class IssueTest extends TestCase
{

    public function testFactory01(): void
    {
        $schema = [
            'id' => 1,
            'number' => 123,
            'title' => 'test title',
            'body' => null,
            'html_url' => null,
            'closed_at' => null
        ];

        $Issue = Issue::factory($schema);

        $this->assertInstanceOf(\App\Service\KanbanBoard\Schema\IssueInterface::class, $Issue);
        $this->assertIsInt($Issue->getId());
        $this->assertIsInt($Issue->getNumber());
        $this->assertIsString($Issue->getTitle());
        $this->assertNull($Issue->getBody());
        $this->assertNull($Issue->getHtmlUrl());
        $this->assertNull($Issue->getClosedAt());

        $this->assertEquals($schema['id'], $Issue->getId());
        $this->assertEquals($schema['number'], $Issue->getNumber());
        $this->assertEquals($schema['title'], $Issue->getTitle());
        $this->assertEquals($schema['body'], $Issue->getBody());
        $this->assertEquals($schema['html_url'], $Issue->getHtmlUrl());
        $this->assertEquals($schema['closed_at'], $Issue->getClosedAt());

        $id = 11;
        $number = 123445;
        $title = 'aa';
        $body = 'bb';
        $htmlUrl = 'cc';
        $closedAt = 'dd';
        $this->assertSame($Issue, $Issue->setId($id));
        $this->assertSame($Issue, $Issue->setNumber($number));
        $this->assertSame($Issue, $Issue->setTitle($title));
        $this->assertSame($Issue, $Issue->setBody($body));
        $this->assertSame($Issue, $Issue->setHtmlUrl($htmlUrl));
        $this->assertSame($Issue, $Issue->setClosedAt($closedAt));

        $this->assertEquals($id, $Issue->getId());
        $this->assertEquals($number, $Issue->getNumber());
        $this->assertEquals($title, $Issue->getTitle());
        $this->assertEquals($body, $Issue->getBody());
        $this->assertEquals($htmlUrl, $Issue->getHtmlUrl());
        $this->assertEquals($schema['closed_at'], $Issue->getClosedAt());
    }

    public function testFactory02(): void
    {
        $schema = [
            'id' => 11,
            'number' => 123445,
            'title' => 'test title',
            'body' => 'body text',
            'html_url' => 'html_url test',
            'closed_at' => new \DateTime()
        ];

        $Issue = Issue::factory($schema);

        $this->assertEquals($schema['id'], $Issue->getId());
        $this->assertEquals($schema['number'], $Issue->getNumber());
        $this->assertEquals($schema['title'], $Issue->getTitle());
        $this->assertEquals($schema['body'], $Issue->getBody());
        $this->assertEquals($schema['html_url'], $Issue->getHtmlUrl());
        $this->assertEquals($schema['closed_at'], $Issue->getClosedAt());

        $id = 111;
        $number = 1234451;
        $title = 'aaa';
        $body = 'bbb';
        $htmlUrl = 'ccc';
        $closedAt = '2022-06-20 15:40:13';
        $this->assertSame($Issue, $Issue->setId($id));
        $this->assertSame($Issue, $Issue->setNumber($number));
        $this->assertSame($Issue, $Issue->setTitle($title));
        $this->assertSame($Issue, $Issue->setBody($body));
        $this->assertSame($Issue, $Issue->setHtmlUrl($htmlUrl));
        $this->assertSame($Issue, $Issue->setClosedAt($closedAt));

        $this->assertEquals($id, $Issue->getId());
        $this->assertEquals($number, $Issue->getNumber());
        $this->assertEquals($title, $Issue->getTitle());
        $this->assertEquals($body, $Issue->getBody());
        $this->assertEquals($htmlUrl, $Issue->getHtmlUrl());
        $this->assertEquals($closedAt, $Issue->getClosedAt()->format('Y-m-d H:i:s'));
    }

}

final class Issue extends \App\Service\KanbanBoard\Schema\Issue
{
    /**
     * @return bool
     */
    public function existsPullRequest(): bool {
        return true;
    }

    /**
     *
     * @param mixed $value
     * @return int (0 - missing)
     */
    public function getForceOfPaused(mixed $value = null): int {
        return 0;
    }

    /**
     * @return string|null
     */
    public function getAssigneeAvatarUrl(): ?string {
        return null;
    }

    /**
     * @return \App\Service\KanbanBoard\Type\IssueState
     */
    public function getKanbanBoardIssueState(): \App\Service\KanbanBoard\Type\IssueState {
        return \App\Service\KanbanBoard\Type\IssueState::ACTIVE;
    }

}
