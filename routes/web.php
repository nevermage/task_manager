<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
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
});

Route::get('/ticket/{number}', function ($number) {
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
});

Route::get('login', function () { return view('login'); });
Route::get('register', function () { return view('register'); });
