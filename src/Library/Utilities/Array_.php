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
     * Check if array key exist and value is not empty
     * Be careful during using this function:
     * empty(0) => true
     * empty('') => true
     * empty(null) => true
     * empty('0') => true
     * empty([]) => true
     *
     * @param array $array
     * @param int|string $key
     * @return bool
     */
    public static function hasValue(mixed $array, int|string $key): bool
    {
        return \is_array($array) && array_key_exists($key, $array) && !empty($array[$key]);

        // In my opinion below code is more proper - but I don't change the code because I don't want change behavior of this function
        //return \is_array($array) && \array_key_exists($key, $array) && $array[$key] !== null;
    }

}
