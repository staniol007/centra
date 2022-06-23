<?php declare(strict_types=1);

namespace App\Library\Validator;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
interface ValidatorInterface
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid(mixed $value): bool;
}
