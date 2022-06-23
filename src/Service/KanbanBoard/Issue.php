<?php declare(strict_types=1);

namespace App\Service\KanbanBoard;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class Issue
{

    /**
     * @param int $id
     * @param int $number
     * @param string $title
     * @param string $body
     * @param string $url
     * @param string|null $assignee
     * @param int $paused
     * @param Percent $progress
     * @param string|null $closed
     */
    public function __construct(
        public int $id,
        public int $number,
        public string $title,
        public string $body,
        public string $url,
        public ?string $assignee,
        public int $paused,
        public Percent $progress,
        public ?string $closed
    )
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Issue
     */
    public function setId(int $id): Issue
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Issue
     */
    public function setNumber(int $number): Issue
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Issue
     */
    public function setTitle(string $title): Issue
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Issue
     */
    public function setBody(string $body): Issue
    {
        $this->body = $body;
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
     * @return Issue
     */
    public function setUrl(string $url): Issue
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAssignee(): ?string
    {
        return $this->assignee;
    }

    /**
     * @param string|null $assignee
     * @return Issue
     */
    public function setAssignee(?string $assignee): Issue
    {
        $this->assignee = $assignee;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaused(): int
    {
        return $this->paused;
    }

    /**
     * @param int $paused
     * @return Issue
     */
    public function setPaused(int $paused): Issue
    {
        $this->paused = $paused;
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
     * @return Issue
     */
    public function setProgress(Percent $progress): Issue
    {
        $this->progress = $progress;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getClosed(): ?string
    {
        return $this->closed;
    }

    /**
     * @param string|null $closed
     * @return Issue
     */
    public function setClosed(?string $closed): Issue
    {
        $this->closed = $closed;
        return $this;
    }

}