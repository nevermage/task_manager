<?php

use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Ticket\CreateController;
use App\Http\Controllers\Ticket\IndexController;
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
    return view('welcome');
});

Route::get('/board', [BoardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('board');

Route::get('/ticket/new', [CreateController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('createTicket');

Route::post('/ticket/create', [CreateController::class, 'create'])
    ->middleware(['auth', 'verified']);

Route::get('/ticket/{number}', [IndexController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('ticket');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
