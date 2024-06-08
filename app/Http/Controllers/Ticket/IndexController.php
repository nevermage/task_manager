<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use App\Models\Ticket;
use App\Models\User;

class IndexController extends Controller
{
    public function index($number)
    {
        $ticket = Ticket::getByNumber($number);

        if (!$ticket) {
            throw new \InvalidArgumentException('Ticket not found');
        }

        $data = [
            'number' => $number,
            'title' => $ticket->title,
            'priorityId' => $ticket->priority_id,
            'status' => Ticket::STATUSES[$ticket->status],
            'assignedUserId' => $ticket->assigned_user_id ?? 1,
            'assignedUserName' => $ticket->assigned_user_id ? User::find($ticket->assigned_user_id)->name : null,
            'description' => $ticket->description,
            'version' => $ticket->version_id ?? 0.1,
            'created' => $ticket->created_at,
            'updated' => $ticket->updated_at,
            'priorities' => Priority::getAsKeyValueArray()
        ];

        return view('ticket', $data);
    }
}
