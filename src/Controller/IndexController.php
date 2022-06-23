<?php declare(strict_types=1);

namespace App\Controller;

use App\Library\Utilities;
use App\Service\KanbanBoard;
use App\Service\KanbanBoard\Type\IssueLabel;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.4
 */
final class IndexController extends AbstractController
{

    /**
     * @return void
     * @throws \Exception
     */
    public function index(): void
    {
        $repositoryNames = \array_filter(
            \array_unique(\explode('|', (string)Utilities::env('GH_REPOSITORIES'))),
            fn(string $repository): bool => $repository != ""
        );
        if (\count($repositoryNames) == 0) {
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

        $KanbanBoard = new KanbanBoard(
            new \App\Service\KanbanBoard\Repository\GitHub($token, $account),
            $repositoryNames,
            [IssueLabel::WAITING_FOR_FEEDBACK->value]
        );

        echo $this->render('index/index', [
            'milestones' => $KanbanBoard->getMilestones()
        ]);
    }

}
