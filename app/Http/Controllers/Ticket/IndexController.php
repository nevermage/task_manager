<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index($number)
    {
        $data = [
            'number' => $number,
            'title' => "Some very long ticket title that contains some sense",
            'priority' => 'Minor',
            'description' => 'Description',
            'version' => '1.1',
            'estimationTime' => '30',
            'timeSpent' => 3,
            'created' => '2024-02-29 15:33:49',
            'updated' => '2024-02-29 16:13:35',
        ];

        return view('ticket', $data);
    }
}
