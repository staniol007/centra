<?php declare(strict_types=1);

namespace App\Tests\Service\KanbanBoard;

use PHPUnit\Framework\TestCase;
use App\Service\KanbanBoard\Percent;

/**
 * Unit test for \App\Service\KanbanBoard\Percent
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 * @example
 * php bin/phpunit tests/Service/KanbanBoard/PercentTest.php
 *
 */
class PercentTest extends TestCase
{

    public function testPercent(): void
    {
        $Percent = new Percent(0, 0);
        $this->singlePercentTest($Percent);
        $this->testSinglePercentValues($Percent, 0, 0, 0, 0);

        $Percent = new Percent(5, 5);
        $this->singlePercentTest($Percent);
        $this->testSinglePercentValues($Percent, 10, 5, 5, 50);

        $Percent = new Percent(1, 9);
        $this->singlePercentTest($Percent);
        $this->testSinglePercentValues($Percent, 10, 1, 9, 10);

        $Percent = new Percent(9, 1);
        $this->singlePercentTest($Percent);
        $this->testSinglePercentValues($Percent, 10, 9, 1, 90);

        $Percent = new Percent(10, 0);
        $this->singlePercentTest($Percent);
        $this->testSinglePercentValues($Percent, 10, 10, 0, 100);

        $Percent = new Percent(0, 10);
        $this->singlePercentTest($Percent);
        $this->testSinglePercentValues($Percent, 10, 0, 10, 0);
    }

    /**
     * @param mixed $Percent
     * @return void
     */
    public function singlePercentTest(mixed $Percent): void
    {
        $this->assertInstanceOf(Percent::class, $Percent);

        $this->assertObjectHasAttribute('total', $Percent);
        $this->assertObjectHasAttribute('complete', $Percent);
        $this->assertObjectHasAttribute('remaining', $Percent);
        $this->assertObjectHasAttribute('percent', $Percent);

        $this->assertIsInt($Percent->getTotal(), 'Total have to be int type');
        $this->assertIsInt($Percent->getComplete(), 'Complete have to be int type');
        $this->assertIsInt($Percent->getRemaining(), 'Remaining have to be int type');
        $this->assertIsFloat($Percent->getPercent(), 'Percent have to be float type');

        $this->assertGreaterThanOrEqual(0, $Percent->getTotal());
        $this->assertGreaterThanOrEqual(0, $Percent->getComplete());
        $this->assertGreaterThanOrEqual(0, $Percent->getRemaining());

        $this->assertGreaterThanOrEqual(0, $Percent->getPercent());
        $this->assertLessThanOrEqual(100, $Percent->getPercent());
    }

    /**
     * @param array $Percent
     * @param int $expectedTotalValue
     * @param int $expectedCompleteValue
     * @param int $expectedRemainingValue
     * @param int $expectedPercentValue
     * @return void
     */
    private function testSinglePercentValues(Percent $Percent, int $expectedTotalValue, int $expectedCompleteValue,
                                             int     $expectedRemainingValue, int $expectedPercentValue
    ): void
    {
        $this->assertEquals($Percent->getTotal(), $expectedTotalValue);
        $this->assertEquals($Percent->getComplete(), $expectedCompleteValue);
        $this->assertEquals($Percent->getRemaining(), $expectedRemainingValue);
        $this->assertEquals($Percent->getPercent(), $expectedPercentValue);
    }

}
