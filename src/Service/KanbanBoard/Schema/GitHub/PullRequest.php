<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub;

use App\Service\KanbanBoard\Schema\Schema;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class PullRequest extends \App\Service\KanbanBoard\Schema\Schema
{
    /** @var string|null */
    private ?string $url = null;

    /** @var string|null */
    private ?string $htmlUrl = null;

    /** @var string|null */
    private ?string $diffUrl = null;

    /** @var string|null */
    private ?string $patchUrl = null;

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return PullRequest
     */
    public function setUrl(?string $url): PullRequest
    {
        $this->url = $url;
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
     * @param string|null $htmlUrl
     * @return PullRequest
     */
    public function setHtmlUrl(?string $htmlUrl): PullRequest
    {
        $this->htmlUrl = $htmlUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiffUrl(): ?string
    {
        return $this->diffUrl;
    }

    /**
     * @param string|null $diffUrl
     * @return PullRequest
     */
    public function setDiffUrl(?string $diffUrl): PullRequest
    {
        $this->diffUrl = $diffUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPatchUrl(): ?string
    {
        return $this->patchUrl;
    }

    /**
     * @param string|null $patchUrl
     * @return PullRequest
     */
    public function setPatchUrl(?string $patchUrl): PullRequest
    {
        $this->patchUrl = $patchUrl;
        return $this;
    }

}
