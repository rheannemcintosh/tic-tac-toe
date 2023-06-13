<?php

use App\Http\Controllers\GameController;
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
    return view('home');
})->name('home');

Route::post('/game/start', [GameController::class, 'start']);
Route::get('/game/create', [GameController::class, 'create'])->name('create');
Route::get('/game/join/{code}', [GameController::class, 'join'])->name('join');
Route::get('/game/{code}', [GameController::class, 'play'])->name('play');
