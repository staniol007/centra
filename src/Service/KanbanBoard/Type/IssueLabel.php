<?php declare(strict_types=1);

namespace App\Service\KanbanBoard\Type;

/**
 * @author Marcin Stanik <marcin.stanik@gmial.com>
 * @since 06.2022
 * @version 1.0.0
 */
enum IssueLabel: string
{

    case WAITING_FOR_FEEDBACK = 'waiting-for-feedback';

}
