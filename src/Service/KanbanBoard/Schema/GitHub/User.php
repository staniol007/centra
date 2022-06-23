<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class User extends \App\Service\KanbanBoard\Schema\Schema
{
    /** @var string|null */
    private ?string $login = null;

    /** @var int|null */
    private ?int $id = null;

    /** @var string|null */
    private ?string $nodeId = null;

    /** @var string */
    private string $avatarUrl;

    /** @var string|null  */
    private ?string $gravatarId = null;

    /** @var string|null  */
    private ?string $url = null;

    /** @var string|null  */
    private ?string $htmlUrl = null;

    /** @var string|null  */
    private ?string $followersUrl = null;

    /** @var string|null  */
    private ?string $followingUrl = null;

    /** @var string|null  */
    private ?string $gistsUrl = null;

    /** @var string|null  */
    private ?string $starredUrl = null;

    /** @var string|null  */
    private ?string $subscriptionsUrl = null;

    /** @var string|null  */
    private ?string $organizationsUrl = null;

    /** @var string|null  */
    private ?string $reposUrl = null;

    /** @var string|null  */
    private ?string $eventsUrl = null;

    /** @var string|null  */
    private ?string $receivedEventsUrl = null;

    /** @var string|null  */
    private ?string $type = null;

    /** @var bool  */
    private bool $siteAdmin = false;

    /** @var string|null  */
    private ?string $name = null;

    /** @var string|null  */
    private ?string $company = null;

    /** @var string|null  */
    private ?string $blog = null;

    /** @var string|null  */
    private ?string $location = null;

    /** @var string|null  */
    private ?string $email = null;

    /** @var bool  */
    private bool $hireable = false;

    /** @var string|null  */
    private ?string $bio = null;

    /** @var string|null  */
    private ?string $twitterUsername = null;

    /** @var int|null  */
    private ?int $publicRepos = null;

    /** @var int|null  */
    private ?int $publicGists = null;

    /** @var int|int  */
    private ?int $followers = null;

    /** @var int|null  */
    private ?int $following = null;

    /** @var \DataTime|null  */
    private ?\DataTime $CreatedAt = null;

    /** @var \DateTime|null  */
    private ?\DateTime $UpdatedAt = null;

    /** @var int|null  */
    private ?int $privateGists = null;

    /** @var int|null  */
    private ?int $totalPrivateRepos = null;

    /** @var int|null  */
    private ?int $ownedPrivateRepos = null;

    /** @var int|null  */
    private ?int $diskUsage = null;

    /** @var int|null  */
    private ?int $collaborators = null;

    /** @var bool  */
    private bool $twoFactorAuthentication = false;

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string|null $login
     * @return User
     */
    public function setLogin(?string $login): User
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
     * @return User
     */
    public function setId(?int $id): User
    {
        $this->id = $id;
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
     * @return User
     */
    public function setNodeId(?string $nodeId): User
    {
        $this->nodeId = $nodeId;
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
     * @return User
     */
    public function setAvatarUrl(?string $avatarUrl): User
    {
        $this->avatarUrl = $avatarUrl;
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
     * @return User
     */
    public function setGravatarId(?string $gravatarId): User
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
     * @return User
     */
    public function setUrl(?string $url): User
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
     * @return User
     */
    public function setHtmlUrl(?string $htmlUrl): User
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
     * @return User
     */
    public function setFollowersUrl(?string $followersUrl): User
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
     * @return User
     */
    public function setFollowingUrl(?string $followingUrl): User
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
     * @return User
     */
    public function setGistsUrl(?string $gistsUrl): User
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
     * @return User
     */
    public function setStarredUrl(?string $starredUrl): User
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
     * @return User
     */
    public function setSubscriptionsUrl(?string $subscriptionsUrl): User
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
     * @return User
     */
    public function setOrganizationsUrl(?string $organizationsUrl): User
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
     * @return User
     */
    public function setReposUrl(?string $reposUrl): User
    {
        $this->reposUrl = $reposUrl;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEventsUrl(): ?string
    {
        return $this->eventsUrl;
    }

    /**
     * @param string|null $eventsUrl
     * @return User
     */
    public function setEventsUrl(?string $eventsUrl): User
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
     * @return User
     */
    public function setReceivedEventsUrl(?string $receivedEventsUrl): User
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
     * @return User
     */
    public function setType(?string $type): User
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
     * @return User
     */
    public function setSiteAdmin(bool $siteAdmin): User
    {
        $this->siteAdmin = $siteAdmin;
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
     * @return User
     */
    public function setName(?string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     * @return User
     */
    public function setCompany(?string $company): User
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBlog(): ?string
    {
        return $this->blog;
    }

    /**
     * @param string|null $blog
     * @return User
     */
    public function setBlog(?string $blog): User
    {
        $this->blog = $blog;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     * @return User
     */
    public function setLocation(?string $location): User
    {
        $this->location = $location;
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
     * @return User
     */
    public function setEmail(?string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHireable(): bool
    {
        return $this->hireable;
    }

    /**
     * @param bool $hireable
     * @return User
     */
    public function setHireable(bool $hireable): User
    {
        $this->hireable = $hireable;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @param string|null $bio
     * @return User
     */
    public function setBio(?string $bio): User
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTwitterUsername(): ?string
    {
        return $this->twitterUsername;
    }

    /**
     * @param string|null $twitterUsername
     * @return User
     */
    public function setTwitterUsername(?string $twitterUsername): User
    {
        $this->twitterUsername = $twitterUsername;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublicRepos(): ?int
    {
        return $this->publicRepos;
    }

    /**
     * @param int|null $publicRepos
     * @return User
     */
    public function setPublicRepos(?int $publicRepos): User
    {
        $this->publicRepos = $publicRepos;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublicGists(): ?int
    {
        return $this->publicGists;
    }

    /**
     * @param int|null $publicGists
     * @return User
     */
    public function setPublicGists(?int $publicGists): User
    {
        $this->publicGists = $publicGists;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFollowers(): ?int
    {
        return $this->followers;
    }

    /**
     * @param int|null $followers
     * @return User
     */
    public function setFollowers(?int $followers): User
    {
        $this->followers = $followers;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFollowing(): ?int
    {
        return $this->following;
    }

    /**
     * @param int|null $following
     * @return User
     */
    public function setFollowing(?int $following): User
    {
        $this->following = $following;
        return $this;
    }

    /**
     * @return \DataTime|null
     */
    public function getCreatedAt(): ?\DataTime
    {
        return $this->CreatedAt;
    }

    /**
     * @param \DataTime|null $CreatedAt
     * @return User
     */
    public function setCreatedAt(?\DataTime $CreatedAt): User
    {
        $this->CreatedAt = \is_string($CreatedAt)
            ? new \DateTime($CreatedAt)
            : $CreatedAt;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->UpdatedAt;
    }

    /**
     * @param \DateTime|string|null $UpdatedAt
     * @return User
     */
    public function setUpdatedAt(\DateTime|string|null $UpdatedAt): User
    {
        parent::setDateTime($this->UpdatedAt, $UpdatedAt);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrivateGists(): ?int
    {
        return $this->privateGists;
    }

    /**
     * @param int|null $privateGists
     * @return User
     */
    public function setPrivateGists(?int $privateGists): User
    {
        $this->privateGists = $privateGists;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalPrivateRepos(): ?int
    {
        return $this->totalPrivateRepos;
    }

    /**
     * @param int|null $totalPrivateRepos
     * @return User
     */
    public function setTotalPrivateRepos(?int $totalPrivateRepos): User
    {
        $this->totalPrivateRepos = $totalPrivateRepos;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOwnedPrivateRepos(): ?int
    {
        return $this->ownedPrivateRepos;
    }

    /**
     * @param int|null $ownedPrivateRepos
     * @return User
     */
    public function setOwnedPrivateRepos(?int $ownedPrivateRepos): User
    {
        $this->ownedPrivateRepos = $ownedPrivateRepos;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDiskUsage(): ?int
    {
        return $this->diskUsage;
    }

    /**
     * @param int|null $diskUsage
     * @return User
     */
    public function setDiskUsage(?int $diskUsage): User
    {
        $this->diskUsage = $diskUsage;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCollaborators(): ?int
    {
        return $this->collaborators;
    }

    /**
     * @param int|null $collaborators
     * @return User
     */
    public function setCollaborators(?int $collaborators): User
    {
        $this->collaborators = $collaborators;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTwoFactorAuthentication(): bool
    {
        return $this->twoFactorAuthentication;
    }

    /**
     * @param bool $twoFactorAuthentication
     * @return User
     */
    public function setTwoFactorAuthentication(bool $twoFactorAuthentication): User
    {
        $this->twoFactorAuthentication = $twoFactorAuthentication;
        return $this;
    }

}
