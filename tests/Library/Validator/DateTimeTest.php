<?php declare(strict_types=1);

namespace App\Tests\Library\Validator;

use PHPUnit\Framework\TestCase;
use App\Library\Filter\Word as FilterWord;

/**
 * Unit test for \App\Library\Validator\DateTime
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 * @example
 * php bin/phpunit tests/Library/Validator/DateTimeTest.php
 */
final class DateTimeTest extends TestCase
{

    public function testIsValid(): void
    {
        $DateTimeValidator = new \App\Library\Validator\DateTime();

        $this->assertTrue($DateTimeValidator->isValid('2022-06-23 11:30:07'));
        $this->assertTrue($DateTimeValidator->isValid(new \DateTime()));

        $this->assertFalse($DateTimeValidator->isValid('2022-06-23'));
        $this->assertFalse($DateTimeValidator->isValid('2022-02-29 11:30:07'));
        $this->assertFalse($DateTimeValidator->isValid('2022-02-28 24:30:07'));
        $this->assertFalse($DateTimeValidator->isValid('2022-02-28 23:65:07'));
        $this->assertFalse($DateTimeValidator->isValid('2022-02-28 23:59:65'));
        $this->assertFalse($DateTimeValidator->isValid('test'));
        $this->assertFalse($DateTimeValidator->isValid(''));
        $this->assertFalse($DateTimeValidator->isValid(null));
        $this->assertFalse($DateTimeValidator->isValid(['2022-06-23 11:30:07']));


        $DateTimeValidator = new \App\Library\Validator\DateTime([
            'format' => 'd.m.Y H:i:s'
        ]);

        $this->assertTrue($DateTimeValidator->isValid('23.06.2022 11:30:07'));
        $this->assertTrue($DateTimeValidator->isValid(new \DateTime()));
        $this->assertFalse($DateTimeValidator->isValid('2022-02-29 11:30:07'));


        $DateTimeValidator = new \App\Library\Validator\DateTime([
            'format' => 'Y-m-d'
        ]);

        $this->assertTrue($DateTimeValidator->isValid('2022-06-23'));
        $this->assertTrue($DateTimeValidator->isValid(new \DateTime()));
        $this->assertFalse($DateTimeValidator->isValid('2022-02-29'));
    }

}
