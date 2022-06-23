<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
class Reaction extends \App\Service\KanbanBoard\Schema\Schema
{
    /** @var string|null */
    private ?string $url = null;

    /** @var int|null */
    private ?int $totalCount = null;

    /** @var int|null */
    private ?int $plusOne = null;

    /** @var int|null */
    private ?int $minusOne = null;

    /** @var int|null */
    private ?int $laugh = null;

    /** @var int|null */
    private ?int $confused = null;

    /** @var int|null */
    private ?int $heart = null;

    /** @var int|null */
    private ?int $hooray = null;

    /** @var int|null */
    private ?int $eyes = null;

    /** @var int|null */
    private ?int $rocket = null;

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Reaction
     */
    public function setUrl(?string $url): Reaction
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param int|null $totalCount
     * @return Reaction
     */
    public function setTotalCount(?int $totalCount): Reaction
    {
        $this->totalCount = $totalCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPlusOne(): ?int
    {
        return $this->plusOne;
    }

    /**
     * @param int|null $plusOne
     * @return Reaction
     */
    public function setPlusOne(?int $plusOne): Reaction
    {
        $this->plusOne = $plusOne;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinusOne(): ?int
    {
        return $this->minusOne;
    }

    /**
     * @param int|null $minusOne
     * @return Reaction
     */
    public function setMinusOne(?int $minusOne): Reaction
    {
        $this->minusOne = $minusOne;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLaugh(): ?int
    {
        return $this->laugh;
    }

    /**
     * @param int|null $laugh
     * @return Reaction
     */
    public function setLaugh(?int $laugh): Reaction
    {
        $this->laugh = $laugh;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getConfused(): ?int
    {
        return $this->confused;
    }

    /**
     * @param int|null $confused
     * @return Reaction
     */
    public function setConfused(?int $confused): Reaction
    {
        $this->confused = $confused;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeart(): ?int
    {
        return $this->heart;
    }

    /**
     * @param int|null $heart
     * @return Reaction
     */
    public function setHeart(?int $heart): Reaction
    {
        $this->heart = $heart;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHooray(): ?int
    {
        return $this->hooray;
    }

    /**
     * @param int|null $hooray
     * @return Reaction
     */
    public function setHooray(?int $hooray): Reaction
    {
        $this->hooray = $hooray;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEyes(): ?int
    {
        return $this->eyes;
    }

    /**
     * @param int|null $eyes
     * @return Reaction
     */
    public function setEyes(?int $eyes): Reaction
    {
        $this->eyes = $eyes;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRocket(): ?int
    {
        return $this->rocket;
    }

    /**
     * @param int|null $rocket
     * @return Reaction
     */
    public function setRocket(?int $rocket): Reaction
    {
        $this->rocket = $rocket;
        return $this;
    }

}
