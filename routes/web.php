<?php

use App\Http\Controllers;
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
    if (!auth()->user()) {
        return redirect('/login');
    }

    return redirect('/board');
});

Route::get('/board', [Controllers\Board\BoardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('board');

Route::get('/ticket/new', [Controllers\Ticket\CreateController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('newTicket');

Route::post('/ticket/create', [Controllers\Ticket\CreateController::class, 'create'])
    ->middleware(['auth', 'verified']);

Route::get('/ticket/{number}/edit', [Controllers\Ticket\EditController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('editTicket');
Route::patch('/ticket/save', [Controllers\Ticket\EditController::class, 'save'])
    ->middleware(['auth', 'verified']);

Route::get('/ticket/{number}', [Controllers\Ticket\IndexController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('ticket');

Route::get('/project/create', [Controllers\Project\CreateController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
