<?php declare(strict_types=1);

namespace App\Library;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 */
class Utilities
{

    use Utilities\System;

    use Utilities\Array_;

    private function __construct()
    {
    }

    /**
     * Dumps information about a variable
     *
     * @param mixed $data
     * @return void
     */
    public static function dump(mixed $data): void
    {
        echo '<pre>';
        \var_dump($data);
        echo '</pre>';
    }

}
