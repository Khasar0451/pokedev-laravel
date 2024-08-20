<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/', [PokemonController::class, 'index']);
Route::get('/favouritesIndex', [PokemonController::class, 'favouritesIndex']);
Route::get('/search', [PokemonController::class, 'search']);
Route::get('/{pokemon}', [PokemonController::class, 'show']);
Route::get('/{pokemon}/addtofavourites', [PokemonController::class, 'addToFavourites']);
Route::get('/{pokemon}/removefromfavourites', [PokemonController::class, 'removeFromFavourites']);