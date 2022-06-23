<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
class Milestone extends Schema
    implements MilestoneInterface
{

    /** @var int */
    protected int $number;

    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var string */
    protected string $htmlUrl;

    /** @var int */
    protected int $closedIssues;

    /** @var int */
    protected int $openIssues;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtmlUrl(): string
    {
        return $this->htmlUrl;
    }

    /**
     * @param string $htmlUrl
     * @return $this
     */
    public function setHtmlUrl(string $htmlUrl): static
    {
        $this->htmlUrl = $htmlUrl;
        return $this;
    }

    /**
     * @return int
     */
    public function getClosedIssues(): int
    {
        return $this->closedIssues;
    }

    /**
     * @param int $closedIssues
     * @return $this
     */
    public function setClosedIssues(int $closedIssues): static
    {
        $this->closedIssues = $closedIssues;
        return $this;
    }

    /**
     * @return int
     */
    public function getOpenIssues(): int
    {
        return $this->openIssues;
    }

    /**
     * @param int $openIssues
     * @return $this
     */
    public function setOpenIssues(int $openIssues): static
    {
        $this->openIssues = $openIssues;
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
     * @return $this
     */
    public function setNumber(int $number): static
    {
        $this->number = $number;
        return $this;
    }

}
