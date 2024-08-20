<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/', [PokemonController::class, 'index']);
Route::get('/search', [PokemonController::class, 'search']);
Route::get('/{pokemon}', [PokemonController::class, 'show']);
Route::get('/{pokemon}/fav', [PokemonController::class, 'fav']);
Route::get('/{pokemon}/unfav', [PokemonController::class, 'unfav']);