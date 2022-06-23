<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Repository;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.3
 */
class Github implements RepositoryInterface
{
    /** @var \Github\Client */
    private \Github\Client $GithubClient;

    /** @var \Github\Api\Issue\Milestones|null */
    private ?\Github\Api\Issue\Milestones $Milestones = null;

    /**
     * @param string $token
     * @param string $account
     */
    public function __construct(
        string         $token,
        private string $account
    )
    {
        $this->GithubClient = new \Github\Client();
        $this->GithubClient->authenticate(
            $token,
            authMethod: \Github\AuthMethod::ACCESS_TOKEN
        );
    }

    /**
     * @param string $repositoryName
     * @return \App\Service\KanbanBoard\Schema\GitHub\Milestone[]
     */
    public function getMilestones(string $repositoryName): array
    {
        if ($this->Milestones === null) {
            $this->Milestones = $this->GithubClient
                ->api('issues')
                ->milestones();
        }

        return \array_map(
            fn(array $milestone): \App\Service\KanbanBoard\Schema\GitHub\Milestone => \App\Service\KanbanBoard\Schema\GitHub\Milestone::factory($milestone),
            $this->Milestones->all($this->account, $repositoryName)
        );
    }

    /**
     * @param string $repositoryName
     * @param int $milestoneNumber
     * @return \App\Service\KanbanBoard\Schema\Issue[]
     */
    public function getIssues(string $repositoryName, int $milestoneNumber): array
    {
        $issueParameters = [
            'milestone' => $milestoneNumber,
            'state' => 'all'
        ];

        return \array_map(
            fn(array $milestone): \App\Service\KanbanBoard\Schema\GitHub\Issue => \App\Service\KanbanBoard\Schema\GitHub\Issue::factory($milestone),
            $this->GithubClient->api('issue')->all($this->account, $repositoryName, $issueParameters)
        );
    }

}
