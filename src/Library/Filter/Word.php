<?php declare(strict_types=1);

namespace App\Library\Filter;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
class Word
{
    /**
     * Example:
     * 'this_is_my_content' will be converted to: 'ThisIsMyContent'
     * 'thisIsMyContent' => 'ThisIsMyContent'
     * @param string $value
     * @return string
     */
    public static function underscoreToCamelCase(string $value): string
    {
        return \implode(
            '',
            \array_map(
                fn(string $methodPartNmae): string => \ucfirst(\strtolower($methodPartNmae)),
                \explode('_', $value)
            )
        );
    }

}
