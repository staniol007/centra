<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class Label extends \App\Service\KanbanBoard\Schema\Schema
{
    /** @var int|null */
    private ?int $id = null;

    /** @var string|null */
    private ?string $name = null;

    /** @var string|null */
    private ?string $node_id = null;

    /** @var string|null */
    private ?string $url = null;

    /** @var string|null */
    private ?string $description = null;

    /** @var string|null */
    private ?string $color = null;

    /** @var string|null */
    private bool $default = false;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Label
     */
    public function setId(?int $id): Label
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Label
     */
    public function setName(?string $name): Label
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNodeId(): ?string
    {
        return $this->node_id;
    }

    /**
     * @param string|null $node_id
     * @return Label
     */
    public function setNodeId(?string $node_id): Label
    {
        $this->node_id = $node_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Label
     */
    public function setUrl(?string $url): Label
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Label
     */
    public function setDescription(?string $description): Label
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string|null $color
     * @return Label
     */
    public function setColor(?string $color): Label
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefault(): bool|string|null
    {
        return $this->default;
    }

    /**
     * @param string|null $default
     * @return Label
     */
    public function setDefault(bool|string|null $default): Label
    {
        $this->default = $default;
        return $this;
    }

}
