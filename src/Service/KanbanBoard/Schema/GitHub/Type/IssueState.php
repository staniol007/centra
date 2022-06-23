<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Schema\GitHub\Type;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
enum IssueState: string
{
    case OPEN = 'open';

    case CLOSED = 'closed';

    case ALL = 'all';
}
