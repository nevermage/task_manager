<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    public function index()
    {
        $ticketPriorities = [
            'Minor',
            'Major',
            'Trivial',
            'Blocker',
        ];

        $boardColumns = [
            'Ready for development' => [],
            'In process' => [],
            'Ready for testing' => [],
            'Testing' => [],
            'Done' => [],
        ];

        $data = array_map(function () use ($ticketPriorities) {
            $ticketData = [];

            for ($i = 0; $i < rand(1,5); $i++) {
                $ticketData[] = [
                    'title' => 'Ticket title some title text about the ticket',
                    'number' => 'MG-' . rand(1, 50),
                    'priority' => $ticketPriorities[array_rand($ticketPriorities)],
                ];;
            }

            return $ticketData;
        }, $boardColumns);

        return view('board', ['columns' => $data]);
    }
}
