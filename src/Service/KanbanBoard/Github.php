<?php declare(strict_types=1);

namespace App\Service\KanbanBoard;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.1
 */
class Github
{
    /** @var \Github\Client */
    private \Github\Client $GithubClient;

    /** @var \Github\Api\Issue\Milestones|null */
    private ?\Github\Api\Issue\Milestones $MilestoneApi = null;

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
     * @param string $repository
     * @return array
     */
    public function milestones(string $repository): array
    {
        if ($this->MilestoneApi === null) {
            $this->MilestoneApi = $this->GithubClient
                ->api('issues')
                ->milestones();
        }

        return $this->MilestoneApi
            ->all($this->account, $repository);
    }

    /**
     * @param string $repository
     * @param int $milestoneId
     * @return array
     */
    public function issues(string $repository, int $milestoneId): array
    {
        $issueParameters = [
            'milestone' => $milestoneId,
            'state' => 'all'
        ];

        return $this->GithubClient->api('issue')
            ->all($this->account, $repository, $issueParameters);
    }

}
