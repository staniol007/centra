<?php declare(strict_types=1);

namespace App\Tests\Library;

use PHPUnit\Framework\TestCase;
use App\Library\Utilities;

/**
 * Unit test for s\App\Library\Utilities
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.1
 */
final class UtilitiesTest extends TestCase
{

    public function testEnv(): void
    {

        $this->assertNotNull(Utilities::env('APP_ENV'));
        $this->assertNotNull(Utilities::env('GH_TOKEN'));
        $this->assertNotNull(Utilities::env('GH_ACCOUNT'));
        $this->assertNotNull(Utilities::env('GH_REPOSITORIES'));

        $this->assertNull(Utilities::env('APP_ENV_AAA'));

        $this->assertEquals(Utilities::env('APP_ENV_AAA', 'AAA'), 'AAA');
    }

    public function testHasValue(): void
    {
        $this->assertTrue(Utilities::hasValue([1], 0));
        $this->assertTrue(Utilities::hasValue(['0' => 1], 0));
        $this->assertTrue(Utilities::hasValue(['aaa' => 1], 'aaa'));

        $this->assertFalse(Utilities::hasValue(['aaa' => 1], 'bbb'));
        $this->assertFalse(Utilities::hasValue([100, 101], 2));

        $this->assertTrue(Utilities::hasValue([0, '0', '', null], 0));
        $this->assertTrue(Utilities::hasValue([0, '0', '', null], 1));
        $this->assertTrue(Utilities::hasValue([0, '0', '', null], 2));

        $this->assertFalse(Utilities::hasValue([0, '0', '', null], 3));
    }

}