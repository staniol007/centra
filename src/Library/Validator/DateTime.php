<?php declare(strict_types=1);

namespace App\Library\Validator;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class DateTime implements ValidatorInterface
{
    /**
     * @var string|mixed
     */
    private string $format = 'Y-m-d H:i:s';

    /**
     * @param array $settings
     */
    public function __construct(array $settings = [])
    {
        if (isset($settings['format'])) {
            $this->format = $settings['format'];
        }
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid(mixed $value): bool
    {
        if (\is_string($value)) {
            return ($DateTime = \DateTime::createFromFormat($this->format, $value)) !== false
                && $DateTime->format($this->format) == $value;
        } elseif ($value instanceof \DateTime) {
            return true;
        }

        return false;
    }

}
