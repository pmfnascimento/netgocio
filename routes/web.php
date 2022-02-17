<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaguesController;
use App\Http\Controllers\SeasonsController;

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

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::post('/list', [HomeController::class, 'list'])->name('home.list');
Route::get('/leagues', [HomeController::class, 'getLeagues'])->name('home.leagues');
Route::post('/seasons', [HomeController::class, 'getSeasons'])->name('home.seasons');
Route::post('/rounds', [HomeController::class, 'getRounds'])->name('home.rounds');
Route::post('/team', [HomeController::class, 'getTeams'])->name('home.team');
Route::post('/player', [HomeController::class, 'getPlayer'])->name('home.player');
