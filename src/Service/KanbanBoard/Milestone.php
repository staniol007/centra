<?php declare(strict_types=1);

namespace App\Service\KanbanBoard;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class Milestone
{

    /**
     * @param string $milestone
     * @param string $url
     * @param Percent $progress
     * @param array $queued
     * @param array $active
     * @param array $completed
     */
    public function __construct(
        public string  $milestone,
        public string  $url,
        public Percent $progress,
        public array   $queued,
        public array   $active,
        public array   $completed
    )
    {
    }

    /**
     * @return string
     */
    public function getMilestone(): string
    {
        return $this->milestone;
    }

    /**
     * @param string $milestone
     * @return Milestone
     */
    public function setMilestone(string $milestone): Milestone
    {
        $this->milestone = $milestone;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Milestone
     */
    public function setUrl(string $url): Milestone
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return Percent
     */
    public function getProgress(): Percent
    {
        return $this->progress;
    }

    /**
     * @param Percent $progress
     * @return Milestone
     */
    public function setProgress(Percent $progress): Milestone
    {
        $this->progress = $progress;
        return $this;
    }

    /**
     * @return array
     */
    public function getQueued(): array
    {
        return $this->queued;
    }

    /**
     * @param array $queued
     * @return Milestone
     */
    public function setQueued(array $queued): Milestone
    {
        $this->queued = $queued;
        return $this;
    }

    /**
     * @return array
     */
    public function getActive(): array
    {
        return $this->active;
    }

    /**
     * @param array $active
     * @return Milestone
     */
    public function setActive(array $active): Milestone
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return array
     */
    public function getCompleted(): array
    {
        return $this->completed;
    }

    /**
     * @param array $completed
     * @return Milestone
     */
    public function setCompleted(array $completed): Milestone
    {
        $this->completed = $completed;
        return $this;
    }

}
