<?php declare(strict_types=1);

namespace App\Service\KanbanBoard;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class Percent
{
    /** @var int */
    public readonly int $total;

    /** @var float */
    public readonly float $percent;

    /**
     * @param int $complete
     * @param int $remaining
     */
    public function __construct(
        public readonly int $complete,
        public readonly int $remaining
    )
    {
        $this->total = $this->complete + $this->remaining;

        $this->percent = $this->total > 0 && $this->complete > 0
            ? \round($this->complete / $this->total  * 100)
            : 0.0;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getComplete(): int
    {
        return $this->complete;
    }

    /**
     * @return int
     */
    public function getRemaining(): int
    {
        return $this->remaining;
    }

    /**
     * @return float
     */
    public function getPercent(): float
    {
        return $this->percent;
    }

}