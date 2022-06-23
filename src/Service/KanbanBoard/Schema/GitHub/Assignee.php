<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class Assignee extends \App\Service\KanbanBoard\Schema\Schema
{
    /** @var string|null */
    private ?string $name = null;

    /** @var string|null */
    private ?string $email = null;

    /** @var string|null */
    private ?string $login = null;

    /** @var int|null */
    private ?int $id = null;

    /** @var string|null */
    private ?string $avatarUrl = null;

    /** @var string|null */
    private ?string $nodeId = null;

    /** @var string|null */
    private ?string $gravatarId = null;

    /** @var string|null */
    private ?string $url = null;

    /** @var string|null */
    private ?string $htmlUrl = null;

    /** @var string|null */
    private ?string $followersUrl = null;

    /** @var string|null */
    private ?string $followingUrl = null;

    /** @var string|null */
    private ?string $gistsUrl = null;

    /** @var string|null */
    private ?string $starredUrl = null;

    /** @var string|null */
    private ?string $subscriptionsUrl = null;

    /** @var string|null */
    private ?string $organizationsUrl = null;

    /** @var string|null */
    private ?string $reposUrl = null;

    /** @var string|null */
    private ?string $eventsUrl = null;

    /** @var string|null */
    private ?string $receivedEventsUrl = null;

    /** @var string|null */
    private ?string $type = null;

    /** @var bool */
    private bool $siteAdmin = false;

    /** @var \DateTime|null */
    private ?\DateTime $StarredAt = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Assignee
     */
    public function setName(?string $name): Assignee
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Assignee
     */
    public function setEmail(?string $email): Assignee
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string|null $login
     * @return Assignee
     */
    public function setLogin(?string $login): Assignee
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Assignee
     */
    public function setId(?int $id): Assignee
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    /**
     * @param string|null $avatarUrl
     * @return Assignee
     */
    public function setAvatarUrl(?string $avatarUrl): Assignee
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNodeId(): ?string
    {
        return $this->nodeId;
    }

    /**
     * @param string|null $nodeId
     * @return Assignee
     */
    public function setNodeId(?string $nodeId): Assignee
    {
        $this->nodeId = $nodeId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGravatarId(): ?string
    {
        return $this->gravatarId;
    }

    /**
     * @param string|null $gravatarId
     * @return Assignee
     */
    public function setGravatarId(?string $gravatarId): Assignee
    {
        $this->gravatarId = $gravatarId;
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
     * @return Assignee
     */
    public function setUrl(?string $url): Assignee
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
     * @return Assignee
     */
    public function setHtmlUrl(?string $htmlUrl): Assignee
    {
        $this->htmlUrl = $htmlUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFollowersUrl(): ?string
    {
        return $this->followersUrl;
    }

    /**
     * @param string|null $followersUrl
     * @return Assignee
     */
    public function setFollowersUrl(?string $followersUrl): Assignee
    {
        $this->followersUrl = $followersUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFollowingUrl(): ?string
    {
        return $this->followingUrl;
    }

    /**
     * @param string|null $followingUrl
     * @return Assignee
     */
    public function setFollowingUrl(?string $followingUrl): Assignee
    {
        $this->followingUrl = $followingUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGistsUrl(): ?string
    {
        return $this->gistsUrl;
    }

    /**
     * @param string|null $gistsUrl
     * @return Assignee
     */
    public function setGistsUrl(?string $gistsUrl): Assignee
    {
        $this->gistsUrl = $gistsUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStarredUrl(): ?string
    {
        return $this->starredUrl;
    }

    /**
     * @param string|null $starredUrl
     * @return Assignee
     */
    public function setStarredUrl(?string $starredUrl): Assignee
    {
        $this->starredUrl = $starredUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubscriptionsUrl(): ?string
    {
        return $this->subscriptionsUrl;
    }

    /**
     * @param string|null $subscriptionsUrl
     * @return Assignee
     */
    public function setSubscriptionsUrl(?string $subscriptionsUrl): Assignee
    {
        $this->subscriptionsUrl = $subscriptionsUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrganizationsUrl(): ?string
    {
        return $this->organizationsUrl;
    }

    /**
     * @param string|null $organizationsUrl
     * @return Assignee
     */
    public function setOrganizationsUrl(?string $organizationsUrl): Assignee
    {
        $this->organizationsUrl = $organizationsUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReposUrl(): ?string
    {
        return $this->reposUrl;
    }

    /**
     * @param string|null $reposUrl
     * @return Assignee
     */
    public function setReposUrl(?string $reposUrl): Assignee
    {
        $this->reposUrl = $reposUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEventsUrl(): ?string
    {
        return $this->eventsUrl;
    }

    /**
     * @param string|null $eventsUrl
     * @return Assignee
     */
    public function setEventsUrl(?string $eventsUrl): Assignee
    {
        $this->eventsUrl = $eventsUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceivedEventsUrl(): ?string
    {
        return $this->receivedEventsUrl;
    }

    /**
     * @param string|null $receivedEventsUrl
     * @return Assignee
     */
    public function setReceivedEventsUrl(?string $receivedEventsUrl): Assignee
    {
        $this->receivedEventsUrl = $receivedEventsUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Assignee
     */
    public function setType(?string $type): Assignee
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSiteAdmin(): bool
    {
        return $this->siteAdmin;
    }

    /**
     * @param bool $siteAdmin
     * @return Assignee
     */
    public function setSiteAdmin(bool $siteAdmin): Assignee
    {
        $this->siteAdmin = $siteAdmin;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getStarredAt(): ?\DateTime
    {
        return $this->StarredAt;
    }

    /**
     * @param \DateTime|null $StarredAt
     * @return Assignee
     */
    public function setStarredAt(\DateTime|string|null $StarredAt): Assignee
    {
        parent::setDateTime($this->StarredAt, $StarredAt);
        return $this;
    }

}
