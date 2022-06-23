<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
abstract class Schema
{

    /**
     * @param array|null $schema
     * @return static
     */
    public static function factory(?array $schema): static
    {
        return (new static())
            ->fillProperties($schema ?? []);
    }

    /**
     * @param array $properties
     * @return $this
     */
    protected function fillProperties(array $properties = []): static
    {
        /**
         * @var string $name
         * @var mixed $name $value
         */
        foreach ($properties as $name => $value) {
            $name = \str_replace(['+1', '-1'], ['plus_one', 'minus_one'], (string)$name);

            // convert array key to method name, example: "html_url" => "getHtmlUrl"
            $methodName = 'set' . \App\Library\Filter\Word::underscoreToCamelCase($name);

            if (\method_exists($this, $methodName)) {
                $this->$methodName($value);
            } else {
                //TODO - add logs: sprintf('Method doesn\'t exist %s:%s', $this::class, $methodName)
            }
        }

        return $this;
    }

    /**
     * @param \DateTime|string|null $property
     * @param \DateTime|string|null $dateTimeValue
     * @return void
     * @throws \Exception\
     */
    protected function setDateTime(\DateTime|string|null &$property, \DateTime|string|null $dateTimeValue): void {
        if (\is_string($dateTimeValue)) {
            if ((new \App\Library\Validator\DateTime())->isValid($dateTimeValue) === true) {
                $property = new \DateTime($dateTimeValue);
            } else {
                //TODO add information to log
            }
        } else {
            $property = $dateTimeValue;
        }
    }

}
