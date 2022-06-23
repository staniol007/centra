<?php declare(strict_types=1);

namespace App\Tests\Library\Filter;

use PHPUnit\Framework\TestCase;
use App\Library\Filter\Word as FilterWord;

/**
 * Unit test for \App\Library\Filter\Word
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 * @example
 * php bin/phpunit tests/Library/Filter/WordTest.php
 */
final class WordTest extends TestCase
{

    public function testUnderscoreToCamelCase(): void
    {
        $word = FilterWord::underscoreToCamelCase('aaa_bbb_ccc');
        $this->assertEquals($word, 'AaaBbbCcc');

        $word = FilterWord::underscoreToCamelCase('AAA_BBB_CCC');
        $this->assertEquals($word, 'AaaBbbCcc');

        $word = FilterWord::underscoreToCamelCase('AaaBbbCcc');
        $this->assertEquals($word, 'Aaabbbccc');

        $word = FilterWord::underscoreToCamelCase('aaa.bbb.ccc');
        $this->assertEquals($word, 'Aaa.bbb.ccc');

        $word = FilterWord::underscoreToCamelCase('aaa__bbb__ccc');
        $this->assertEquals($word, 'AaaBbbCcc');
    }

}
