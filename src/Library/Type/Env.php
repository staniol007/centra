<?php declare(strict_types=1);

namespace App\Library\Type;

/**
 * Environment types
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 */
enum Env: string
{
    case PRODUCTION = 'production';

    case LOCAL = 'local';

    case TEST = 'test';
}
