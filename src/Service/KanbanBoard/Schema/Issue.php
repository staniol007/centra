<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
abstract class Issue extends Schema
    implements IssueInterface
{

    /** @var int */
    protected int $id;

    /** @var int */
    protected int $number;

    /** @var string */
    protected string $title;

    /** @var string|null */
    protected ?string $body = null;

    /** @var string|null */
    protected ?string $htmlUrl = null;

    /** @var \DateTime|null */
    protected ?\DateTime $ClosedAt = null;

    /**
     * @return int|null
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): static
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
     * @return $this
     */
    public function setNumber(int $number): static
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
     * @return $this
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string|null $body
     * @return $this
     */
    public function setBody(?string $body): static
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHtmlUrl(): ?string
    {
        return $this->htmlUrl;
    }

    /**
     * @param string|string $htmlUrl
     * @return $this
     */
    public function setHtmlUrl(?string $htmlUrl): static
    {
        $this->htmlUrl = $htmlUrl;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getClosedAt(): ?\DateTime
    {
        return $this->ClosedAt;
    }

    /**
     * @param \DateTime|string|null $ClosedAt
     * @return $this
     * @throws \Exception
     */
    public function setClosedAt(\DateTime|string|null $ClosedAt): static
    {
        parent::setDateTime($this->ClosedAt, $ClosedAt);

        return $this;
    }

}
