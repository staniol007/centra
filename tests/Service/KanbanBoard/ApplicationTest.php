<?php declare(strict_types=1);

namespace App\Tests\Service\KanbanBoard;

use PHPUnit\Framework\TestCase;
use App\Service\KanbanBoard\Application;

/**
 * Unit test for s\App\Library\Utilities
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class ApplicationTest extends TestCase
{
    /** @var Application|null */
    private Application $Application;

    /** @var \ReflectionClass */
    private \ReflectionClass $ApplicationReflection;

    protected function setUp(): void
    {
        $this->ApplicationReflection = new \ReflectionClass(Application::class);

        $this->Application = new Application(
            new \App\Service\KanbanBoard\Github('aaa', 'bbb'),
            ['ccc'], [Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK]
        );
    }

    public function testState(): void
    {
        $_stateMethod = $this->ApplicationReflection->getMethod('_state');
        $_stateMethod->setAccessible(true);

        $issue = [
            'state' => 'closed',
            'assignee' => [],
        ];
        $state = $_stateMethod->invokeArgs($this->Application, [$issue]);
        $this->assertEquals($state, Application::ISSUE_STAGE_COMPLETED);

        $issue = [
            'state' => '',
            'assignee' => ['test'],
        ];
        $state = $_stateMethod->invokeArgs($this->Application, [$issue]);
        $this->assertEquals($state, Application::ISSUE_STAGE_ACTIVE);

        $issue = [
            'state' => '',
            'assignee' => [],
        ];
        $state = $_stateMethod->invokeArgs($this->Application, [$issue]);
        $this->assertEquals($state, Application::ISSUE_STAGE_QUEUED);
    }

    public function testLabelsMatch(): void
    {
        $_labelsMatchMethod = $this->ApplicationReflection->getMethod('_labelsMatch');
        $_labelsMatchMethod->setAccessible(true);

        $issue = [
        ];
        $labels = $_labelsMatchMethod->invokeArgs($this->Application, [$issue]);
        $this->assertIsArray($labels);
        $this->assertEquals($labels, []);

        $issue = [
            'labels' => []
        ];
        $labels = $_labelsMatchMethod->invokeArgs($this->Application, [$issue]);
        $this->assertIsArray($labels);
        $this->assertEquals($labels, []);

        $issue = [
            'labels' => [
                [
                    'test' => Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK
                ],
            ]
        ];
        $labels = $_labelsMatchMethod->invokeArgs($this->Application, [$issue]);
        $this->assertIsArray($labels);
        $this->assertEquals($labels, []);

        $issue = [
            'labels' => [
                [
                    'name' => 'test'
                ]
            ]
        ];
        $labels = $_labelsMatchMethod->invokeArgs($this->Application, [$issue]);
        $this->assertIsArray($labels);
        $this->assertEquals($labels, []);

        $issue = [
            'labels' => [
                [
                    'name' => Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK
                ]
            ]
        ];
        $labels = $_labelsMatchMethod->invokeArgs($this->Application, [$issue]);
        $this->assertIsArray($labels);
        $this->assertEquals($labels, [Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK]);

        $issue = [
            'labels' => [
                [
                    'name' => Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK
                ],
                [
                    'name' => 'test'
                ]
            ]
        ];
        $labels = $_labelsMatchMethod->invokeArgs($this->Application, [$issue]);
        $this->assertIsArray($labels);
        $this->assertEquals($labels, [Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK]);

        $issue = [
            'labels' => [
                [
                    'name' => Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK
                ],
                [
                    'name' => Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK
                ]
            ]
        ];
        $labels = $_labelsMatchMethod->invokeArgs($this->Application, [$issue]);
        $this->assertIsArray($labels);
        $this->assertEquals($labels, [Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK]);
    }

    public function testPercent(): void
    {
        $_percentMethod = $this->ApplicationReflection->getMethod('_percent');
        $_percentMethod->setAccessible(true);

        $percent = $_percentMethod->invokeArgs($this->Application, [0, 0]);
        $this->assertEquals($percent, []);
    }

}