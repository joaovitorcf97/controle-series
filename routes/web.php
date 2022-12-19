<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::middleware('autenticador')->group(function () {
    Route::get('/', function () {
        return redirect('/series');
    });
    
    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
        ->name('seasons.index');
    
    Route::get('seasons/{season}/episodes', [EpisodeController::class, 'index'])
        ->name('episodes.index');
    
    Route::post('seasons/{season}/episodes', [EpisodeController::class, 'update'])
        ->name('episodes.update');
});

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('signin');

Route::get('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::get('/register', [UserController::class, 'create'])
    ->name('user.create');

Route::post('/register', [UserController::class, 'store'])
    ->name('user.store');