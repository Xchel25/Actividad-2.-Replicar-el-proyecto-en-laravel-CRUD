<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\CategoryController;

// Web Routes
Route::get('/', function () {
    // return view('welcome');
    return "Bienvenidos al curso de Laravel 9 en El rincon de Isma";
});

Route::get('/games', [GamesController::class, 'index'])->name('games');
Route::get('/games/create', [GamesController::class, 'create'])->name('gamesCreate');
Route::get('/games/{name_game}/{categoria?}', [GamesController::class, 'help']);
Route::post('/games/storeVideogame', [GamesController::class, 'storeVideogame'])->name('createVideogame');
Route::get('/view/{game_id}', [GamesController::class, 'view'])->name('viewGame');
Route::post('/games/updateVideogame', [GamesController::class, 'updateVideogame'])->name('updateVideogame');
Route::get('/delete/{game_id}', [GamesController::class, 'delete'])->name('deleteGame');

Route::resource('categories', CategoryController::class);

