<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function index()
    {
        return view('createTicket');
    }

    public function create()
    {
        return ['data' => ['number' => 'MG-12']];
    }
}
