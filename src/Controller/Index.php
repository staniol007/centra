<?php declare(strict_types=1);

namespace App\Controller;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 */
final class Index extends AbstractController
{

    /**
     * @return void
     */
    public function index(): void {
        $repositories = explode('|', \App\Library\Utilities::env('GH_REPOSITORIES'));
        $token = \App\Library\Utilities::env('GH_TOKEN');
        $account = \App\Library\Utilities::env('GH_ACCOUNT');

        $GithubClient = new \App\Service\KanbanBoard\GithubClient($token, $account);
        $Application = new \App\Service\KanbanBoard\Application($GithubClient, $repositories, array('waiting-for-feedback'));

        echo $this->render('index', [
            'milestones' => $Application->board()
        ]);
    }

}
