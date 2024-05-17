<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class BoardController extends Controller
{
    public function index()
    {
        $data = [];

        foreach (Ticket::all() as $ticket) {
            $data[Ticket::STATUSES[$ticket->status]][] = [
                'title' => $ticket->title,
                'number' => 'AQ-' . $ticket->id,
                'priority' => $ticket->priority,
            ];
        }

        return view('board', ['columns' => $data]);
    }
}
