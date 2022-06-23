<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Type;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
enum IssueState: string
{
    case COMPLETED = 'completed';

    case ACTIVE = 'active';

    case QUEUED = 'queued';

}
