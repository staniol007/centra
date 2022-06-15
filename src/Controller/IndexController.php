<?php declare(strict_types=1);

namespace App\Controller;

use App\Library\Utilities;
use \App\Service\KanbanBoard\Application;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.2
 */
final class IndexController extends AbstractController
{

    /**
     * @return void
     * @throws \Exception
     */
    public function index(): void
    {
        // This part of code is not supported any more. I only implemented it to show what it should look like, if it would work
        /* START deprecated code
        $clientId = Utilities::env('GH_CLIENT_ID', 'AAA');
        $clientSecret = Utilities::env('GH_CLIENT_SECRET', 'BBB');
        $Authentication = new \App\Service\KanbanBoard\Authentication($clientId, $clientSecret);
        $token = $Authentication->login();
        END deprecated */

        $repositories = \array_filter(
            \array_unique(\explode('|', (string)Utilities::env('GH_REPOSITORIES'))),
            fn(string $repository): bool => $repository != ""
        );
        if (\count($repositories) == 0) {
            throw new \Exception('Missing GitHub repositories!');
        }

        $token = (string)Utilities::env('GH_TOKEN');
        if ($token == '') {
            throw new \Exception('Missing GitHub App token');
        }

        $account = (string)Utilities::env('GH_ACCOUNT');
        if ($account == '') {
            throw new \Exception('Missing GitHub account');
        }

        $Application = new Application(
            new \App\Service\KanbanBoard\Github($token, $account),
            $repositories, [Application::ISSUE_LABEL_WAITING_FOR_FEEDBACK]
        );

        echo $this->render('index', [
            'milestones' => $Application->board()
        ]);
    }

}
