<?php declare(strict_types=1);

namespace App\Library\Utilities;

/**
 * @autor Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.1
 */
trait SystemTrait
{

    /**
     * Gets the value of an environment variable.
     *
     * @param string $name
     * @param string|null $default
     * @return string|null - Returns the value of the environment variable, or default value if the environment variable does not exist.
     */
    public static function env(string $name, ?string $default = null): ?string
    {
        $value = \getenv($name);

        if ($value === false) {
            $value = \getenv($name, true);
        }

        return $value !== false
            ? $value
            : $default;
    }

}
