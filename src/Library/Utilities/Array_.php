<?php declare(strict_types=1);

namespace App\Library\Utilities;

/**
 * @autor Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 */
trait Array_
{

    /**
     * Check if array key exist and value is not NULL
     *
     * @param array $array
     * @param int|string $key
     * @return bool
     */
    public static function hasValue(array $array, int|string $key): bool
    {
        return \array_key_exists($key, $array) && $array[$key] !== null;
    }

}
